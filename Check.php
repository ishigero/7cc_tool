<?php
class Check extends CI_Controller {

  const SOURCE_DIR = path to target souce directory;
  const CHECKER = path to php7cc.php; //ex vendor/sstalle/php7cc/bin/php7cc.php
  const OUTPUT_FILE_SUFFIX = '_errors.txt';
  const FLG = 'Checked';


  public function index() {
      //ファイル取得開始
      $list = $this->_getFileList(self::SOURCE_DIR);
      
      //チェック開始
      foreach($list as $file) {
          log_message('info', '■checked:'.$file);
          $this->_outputErrorFile($file);
          if($this->_isError($file.self::OUTPUT_FILE_SUFFIX)) { // error
              
          } else { // not error
              $result = unlink($file.self::OUTPUT_FILE_SUFFIX);
              $bool = 'FAILED';
              if($result === TRUE) $bool = 'SUCCESS';
              log_message('info', '■delete_is:'.$bool);
          }          
      }
      //チェック開始
  }


  private function _isError($file) {
      $ret = FALSE;
      $input = file($file);
      if(strstr($input[0], self::FLG) === FALSE)
      $ret = TRUE;
      return $ret;
  }


  private function _doCheck($filePath) {
      $cmd = 'php '.self::CHECKER.' '.$filePath;
      return shell_exec($cmd);
  }


  private function _outputErrorFile($filePath) {
      $cmd = 'php '.self::CHECKER.' '.$filePath.' > '.$filePath.self::OUTPUT_FILE_SUFFIX;
      shell_exec($cmd);
      return;
  } 


  private function _getFileList($dir) {
    $files = glob(rtrim($dir, '/') . '/*');
    $list = array();
    foreach ($files as $file) {
        if (is_file($file) && strstr($file, '.php') != FALSE) {
            $list[] = $file;
        }
        if (is_dir($file)) {
            $list = array_merge($list, $this->_getFileList($file));
        }
    }
    return $list;
    }
}
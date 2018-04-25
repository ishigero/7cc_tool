<?php
class Check {

  const SOURCE_DIR = '/home/vagrant/work/source'; //target directory
  const CHECKER = '/home/vagrant/vendor/sstalle/php7cc/bin/php7cc.php';  //path to php7cc.php
  const OUTPUT_FILE_SUFFIX = '_errors.txt';
  const FLG = 'Checked';


  public static function run() {
      $list = self::_getFileList(self::SOURCE_DIR);
      foreach($list as $file) {
          echo 'checked : '. $file.PHP_EOL;
          self::_outputErrorFile($file);
          if(self::_isError($file.self::OUTPUT_FILE_SUFFIX)) { // error
          } else { // not error
              $result = unlink($file.self::OUTPUT_FILE_SUFFIX);
          }          
      }
  }


  private function _isError(String $file): bool {
      $ret = FALSE;
      $input = file($file);
      if(strstr($input[0], self::FLG) === FALSE)
      $ret = TRUE;
      return $ret;
  }


  private function _doCheck(String $filePath) {
      $cmd = 'php '.self::CHECKER.' '.$filePath;
      return shell_exec($cmd);
  }


  private function _outputErrorFile(String $filePath) {
      $cmd = 'php '.self::CHECKER.' '.$filePath.' > '.$filePath.self::OUTPUT_FILE_SUFFIX;
      shell_exec($cmd);
      return;
  } 


  private function _getFileList(String $dir): array{
    $files = glob(rtrim($dir, '/') . '/*');
    $list = [];
    foreach ($files as $file) {
        if (is_file($file) && strstr($file, '.php') != FALSE) {
            $list[] = $file;
        }
        if (is_dir($file)) {
            $list = array_merge($list, self::_getFileList($file));
        }
    }
    return $list;
    }
}
# 静的解析ツール「[php7cc](https://github.com/sstalle/php7cc)」の実行ツール

## 概要
- php7ccは、php5からphp7にバージョンアップした際に修正が必要な箇所を解析するツールです
- ディレクトリ構造は維持されます
- sourceディレクトリ内のディレクトリを再帰的に解析します
- 修正が必要なファイルの情報は、「元のファイル名_errors.txt」の形で出力します

## 前提
- vagrantがインストールされている

## 環境
- ubuntu 16.04(Xenial)
- php 7.2.4


## ディレクトリ構成
```
-------
|--work
|   |---source：解析対象ソースコードの格納ディレクトリ
|   |---Check.php：php7ccの呼び出し
|   |---Main.php：本ツールのエントリーポイント
|   |---provision.sh：Vagrant起動時のプロビジョンファイル
|   |---output.txt：***_errors.txt 一覧
-------
```

## 使い方
```
$ vagrant up
$ vagrant ssh
$ cd work
$ php Main.php
```




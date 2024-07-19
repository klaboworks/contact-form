# お問い合わせフォーム

## 環境構築

### Dockerビルド
1.git clone git@github.com:klaboworks/contact-form.git  
2.docker-compose up -d --build  

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

### Laravel環境構築

1.docker-compose exec php bash  
2.composer install  
3..env.exampleファイルから.envファイルを作成し、環境変数を変更  
4.php artisan key:generate  
5.php artisan migrate  
6.php artisan fb:seed  
※6のシーディング工程でエラーが出ます。

## 使用技術
・PHP 8.1.29  
・Laravel 8.83.27  
・MySQL 15.1  

## ER図
![ER_contact-form](https://github.com/user-attachments/assets/088bd097-dc9d-4150-9c22-e823fef86374)


## URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/

## 【実装できていない機能】
### ■お問い合わせフォームの入力画面
・バリデーションエラー時の入力値保持  
　　↳「性別」「お問い合わせの種類」  
・textareaのplaceholderと {{ old('detail') }}の共存  

### ■お問い合わせフォームの確認画面
・「修正」リンクをクリックし、お問い合わせフォームに遷移した時の値保持  
　　↳「性別」「お問い合わせの種類」

### ■管理画面
・検索フォームを等間隔に並べる  
・CSVエクスポート機能の実装  
・ページネーション実装  
　　↳リレーションテーブルの表示×Pagenateメソッドができなかった。  
・詳細ボタンを押した時にテーブルの一番上のレコードしか取得できない（？）  
・モーダルウィンドウの右上、クローズボタンの画像取得  

### ■その他
・ページを判別して「register」「login」ボタンの表示・非表示を切り替える  
・各ページ、各タグのクラス命統一感保持  
・リレーションしたテーブルのシーディング  
・registerでユーザー登録したら勝手にloginしてadminページに飛んでしまう。
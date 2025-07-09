# メールシステム実装 - orivance_0709

## 概要
このディレクトリには、orivance_0709のメールシステムが実装されています。cloud_0709のメールシステムを参考に、orivanceのデザインと構造に合わせて実装されています。

## ファイル構成

### PHP ファイル
- `contact.php` - お問い合わせフォーム（メインページ）
- `confirm.php` - お問い合わせ確認ページ
- `send.php` - メール送信処理
- `complete.php` - 送信完了ページ

### 設定ファイル
- `config/email_config.php` - メール設定とテンプレート
- `config/environment.php` - 環境設定
- `includes/EmailService.php` - メール送信サービス

### 依存関係
- `vendor/` - PHPMailerライブラリ
- `.env` - 環境変数設定

## 機能

### 1. お問い合わせフォーム (contact.php)
- 以下のフィールドを含む：
  - お名前（必須）
  - 会社名（任意）
  - TEL（任意）
  - E-MAIL（必須）
  - お問い合わせカテゴリー（選択式）
  - お問い合わせ内容（必須）
  - 同意チェックボックス（必須）

### 2. バリデーション
- クライアントサイド（JavaScript）とサーバーサイド（PHP）の両方でバリデーション
- 必須項目のチェック
- メールアドレス形式の検証
- エラーメッセージの表示

### 3. 確認ページ (confirm.php)
- 入力内容の確認表示
- 修正機能（フォームに戻る）
- 送信機能

### 4. メール送信 (send.php)
- EmailServiceを使用したメール送信
- 通知メール（会社宛）
- 確認メール（顧客宛）
- エラーハンドリング

### 5. 完了ページ (complete.php)
- 送信完了メッセージ
- ホームページへのリンク

## メール設定

### SMTP設定
`.env`ファイルで以下の設定を行います：

```
SMTP_HOST=localhost
SMTP_PORT=1025
SMTP_USERNAME=
SMTP_PASSWORD=
SMTP_SECURE=false
FROM_EMAIL=test@example.com
TO_EMAIL=contact@orivance.co.jp
COMPANY_NAME=株式会社orivance
```

### 開発環境
- MailHogを使用したローカル開発環境に対応
- 認証なしのSMTP設定

## 使用方法

1. お問い合わせフォームにアクセス
2. 必要項目を入力
3. 確認ページで内容を確認
4. 送信ボタンでメール送信
5. 完了ページで送信完了を確認

## カスタマイズ

### メールテンプレートの変更
`config/email_config.php`の以下のメソッドを編集：
- `getNotificationEmailTemplate()` - 通知メールテンプレート
- `getConfirmationEmailTemplate()` - 確認メールテンプレート

### バリデーションルールの変更
`includes/EmailService.php`の`validateEmailData()`メソッドを編集

### フォームフィールドの追加
1. `contact.php`のフォームにフィールドを追加
2. `confirm.php`で表示を追加
3. `EmailService.php`の`sanitizeEmailData()`メソッドにフィールドを追加
4. メールテンプレートにフィールドを追加

## 注意事項

- PHPMailerライブラリが必要です
- SMTPサーバーの設定が必要です
- 本番環境では適切なSMTP認証情報を設定してください
- エラーログの確認を推奨します

## トラブルシューティング

### メールが送信されない場合
1. SMTP設定を確認
2. エラーログを確認
3. PHPMailerのデバッグモードを有効化

### フォームが動作しない場合
1. PHPの設定を確認
2. ファイルパーミッションを確認
3. ブラウザのコンソールでエラーを確認 
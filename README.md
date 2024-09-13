# Rese（リーズ）

ある企業のグループ会社の飲食店予約サービス

![TOP画像](TOP画像.png)

## 作成した目的

自社のサービスを持つことで、外部の飲食店予約サービスの手数料が不要になるため。

## 機能一覧

- 会員登録
- ログイン
- ログアウト
- メール認証機能
- ログイン権限機能
  - 管理者
  - 店舗代表者
  - 利用者(ユーザー)
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加・削除機能
- 飲食店予約情報追加・変更・削除機能
- 検索機能
  - エリア
  - ジャンル
  - 店名
- バリデーション機能
  - 会員登録
  - ログイン
  - 予約登録・変更
  - 口コミ登録
  - 店舗情報登録・変更
  - 店舗代表者登録
  - CSV インポート
- レスポンシブデザイン
  - ブレイクポイント 768px
  - ブレイクポイント 480px
- 管理者：店舗代表者登録機能
- 管理者：CSV インポート機能
- 店舗代表者：予約確認機能
- 店舗代表者：店舗情報登録・変更機能
- 店舗代表者：メール送信機能
- 店舗代表者：予約リマインドメール送信機能（タスクスケジューラー）
- ストレージ機能(店舗画像保存)
- QR コード発行・照合機能
- Stripe 決済機能
- 口コミ機能
  - 新規登録(ユーザーのみ)
  - 編集(ユーザーのみ)
  - 削除(ユーザー・管理者)
- 店舗一覧ソート機能
  - ランダム
  - 評価が高い順
  - 評価が低い順

## 使用技術(実行環境)

- laravel8
- laravel breeze
- php8.2.8
- JavaScript
- MailHog
- Stripe

## テーブル設計

![テーブル設計](テーブル設計図追加.jpg)

## ER 図

![ER図](ER図追加.jpg)

## 環境構築

1.  リポジトリの設定(以下をクローン)

    git@github.com:YukikoTK/Takeichi_reservation_system.git

2.  Docker の設定(開発環境構築)

    $ docker-compose up -d --build

3.  Laravel のパッケージのインストール

    PHP コンテナにログイン

    $ docker-compose exec php bash

    パッケージのインストール

    $ composer install

4.  .env ファイルの作成

    $ cp .env.example .env

5.  以下の通り.env ファイルの修正

    DB_CONNECTION=mysql

    DB_HOST=mysql

    DB_PORT=3306

    DB_DATABASE=laravel_db

    DB_USERNAME=laravel_user

    DB_PASSWORD=laravel_pass

6.  アプリケーションを起動するためのキーを生成

    php artisan key:generate

7.  モデルのマイグレーション、データ挿入

    php artisan migrate:fresh --seed

8.  店舗画像を storage に移動 （移動の理由についてはその他を参照）

    src/storage/app/public/の中に image ディレクトリを作成

    （作成後のパス：src/storage/app/public/image）

    プロジェクト直下の Image ディレクトリ内の以下のファイルを、

    src/storage/app/public/image へコピーする。（ファイルのみコピーすること）

        italian.jpg

        izakaya.jpg

        ramen.jpg

        sushi.jpg

        yakiniku.jpg

9.  シンボリックリンクの作成

    ストレージに保存された店舗画像を表示させるために、以下のコマンドを実行

    php artisan storage:link

10. mailhog 導入(下記を docker-compose.yml に追記)

        volumes:

          db-volume:

          maildir: {}

        mail:

            image: mailhog/mailhog

            container_name: mailhog

            ports:

              - "8025:8025"

            environment:

              MH_STORAGE: maildir

              MH_MAILDIR_PATH: /tmp

            volumes:

              - maildir:/tmp

11. 下記コマンドを実行し、イメージの再ビルドとコンテナ起動

        $ docker-compose build

        $ docker-compose up -d

12. 下記の通り.env を修正

         MAIL_MAILER=smtp

         MAIL_HOST=mail

         MAIL_PORT=1025

         MAIL_USERNAME=null

         MAIL_PASSWORD=null

         MAIL_ENCRYPTION=null

         MAIL_FROM_ADDRESS=hello@example.com

         MAIL_FROM_NAME="${APP_NAME}"

13. 以下にログインし、認証メールの受信を確認

    http://localhost:8025/

14. 以下の認証済みユーザーにてログイン

- 管理者

  name：管理者太郎

  email：taro@test.com

  password：password

- 店舗代表者

  name：代表花子

  email：hanako@test.com

  password：password

- 利用者

  name：利用者五郎

  email：goro@test.com

  password：password

15. 予約リマインドメール送信

    src/app/Console/Kernel.php の送信時間を必要に応じて変更し、

    以下のコマンドを実行(現在は AM8:00 に設定中)

         php artisan reminder:send

16. Stripe 決済機能の環境を以下の通り構築

    1. https://stripe.com/jp にてアカウントを取得

    2. API キーを取得

    3. composer require laravel/cashier にて Cashier のパッケージをインストール

    4. .env ファイルの一番下に取得した API キーを貼り付け

       STRIPE_KEY=ここに取得した公開可能キーを記述

       STRIPE_SECRET=ここに取得したシークレットキーを記述

    5. 以下のテスト情報で stripe 決済を実行

       email : goro@test.com

       カード番号：4242 4242 4242 4242

       有効期限 : 12/24

       CVC : 123

17. CSV インポート機能の環境を以下の通り構築

    1.  composer require maatwebsite/excel にて larave-excel をインストール

    2.  config/app.php の service provider に以下のライブラリを登録

            'providers' => [
              /*
              * Package Service Providers...
              */
              Maatwebsite\Excel\ExcelServiceProvider::class,
            ]

    3.  config/app.php の Facade も登録

            'aliases' => [
              ...
              'Excel' => Maatwebsite\Excel\Facades\Excel::class,
            ]

    4.  以下のコマンドで、config ファイルを publish

            php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config

    5.  以下を参考に CSV ファイルを作成

        ![CSVデータ作成手順](Rese_csvデータ作成手順.png)

## その他

- ログインの有無により、アクセスできるページが異なる。

  ログイン無の場合は、以下のみアクセスが可能

  - 店舗一覧ページ（/）

  - 店舗詳細ページ（/detail）：予約フォーム非表示

- 店舗画像を storage に移動する作業について

  storage ディレクトリに保存されているファイルは、.gitignore ファイルにより

  無視される。対応として、src/storage/app/public/image 直下に.gitignore ファイルを

  作成し、src ディレクトリ直下の.gitignore ファイルも storage の image を

  github にコミットできるよう修正をしたが、反映しなかった為、

  今回の手順により、店舗画像を storage から読み込み view に表示できるようにした。

- 参考：口コミ機能は、以下のテストデータにて確認可能

  ![口コミ機能テストデータ](口コミ機能テストデータ.jpg)

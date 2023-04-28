# watchlist-API

A simple REST API written in PHP with Laravel.
<br>

<details>
<summary>How to install</summary>
<br>
Clone the project

```bash
  git clone https://github.com/PS223934/watchlist-api.git
```

Go to the project directory

```bash
  cd watchlist-api
```

Update dependencies

```bash
  composer update
```

```bash
  npm update
```

Install dependencies

```bash
  composer install
```
```bash
  npm install vite
```


Start the server

```bash
  php artisan serve
```
</details>

<details open>
<summary>API Reference</summary>
<br>

#### Get all visible watchlists

```http
  GET \API\v1\watchlists
```

| Parameter | Type     | Description                | Required        | Default         |
| :-------- | :------- | :------------------------- | :-------------- | :-------------- |
| `identifier` | `string (UUID)` | Returns only watchlists that are owned by the identifier |   No   | -     |
| `limit` | `integer` | The amount of watchlists that that will be returned (min. 1 - max. 10) |   No   | 10 |
| `offset` | `integer` | The offset of watchlists that that will be returned |   No   | 0 |

<br>

#### Creating a new identifier

```http
  POST \API\v1\identifiers
```

| Parameter | Type     | Description                | Required        | Default         |
| :-------- | :------- | :------------------------- | :-------------- | :-------------- |
| `reference` | `string` | A public reference (name) given with every resource the identifier will create/update |   Yes (Must be unique)    | -     |

> **Warning**
>
> If the identifier (UUID) is lost, it can not be recovered through the api itself.
>
> Anyone with access to an identifier can manage its resources.

</details>


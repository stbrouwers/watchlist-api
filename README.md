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

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `identifier (UUID)` | `string` | Returns only watchlists that are owned by the UUID (Optional) |



</details>


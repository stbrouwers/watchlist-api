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
<br>

## API Documentation

<details open>
<summary>Watchlists</summary>

#### Get all visible watchlists

```http
  GET \API\v1\watchlists
```

| Parameter | Type     | Description                | Required        | Default         |
| :-------- | :------- | :------------------------- | :-------------- | :-------------- |
| `identifier` | `string(UUID) or integer(ID)` | Returns only watchlists that are owned by the identifier |   No   | -     |
| `limit` | `integer` | The amount of watchlists that that will be returned (min. 1 - max. 10) |   No   | 10 |
| `offset` | `integer` | The offset of watchlists that that will be returned |   No   | 0 |
  
> [!NOTE]
>
> You can only obtain the contents of a watchlist by requesting a single one.
>
> This is done by passing either the uuid that belongs to a watchlist (`watchlist identifier`), or the id of the watchlist itself.
  
> [!IMPORTANT]
>
> Privilege is needed in order to request a private watchlist.
>
> Privilege is granted to both the `personal identifier` that originally created the watchlist and the `watchlist identifier`.
 
  
<br>
  
#### Create a new watchlist
  
```http
   POST \API\v1\watchlists
```
  
| Parameter | Type     | Description                | Required        | Default         |
| :-------- | :------- | :------------------------- | :-------------- | :-------------- |
| `identifier (personal)`| `string(UUID)` | The personal identifier your playlist will be bound to.  | Yes             | -               |
| `name`    | `string` | A name for your watchlist.  | Yes             | -               |
| `private`    | `bool or integer` | Whether or not the watchlist can be changed without the personal and/or watchlist identifier.  | No             | False (0)               |
| `hidden`    | `bool or integer` | Whether or not the watchlist can be found by it's name or generic id(integer).  | No             | False (0)               |

</details>
<br>

<details>
<summary>Identifiers</summary>

#### Creating a new identifier

```http
   POST \API\v1\identifiers
```

| Parameter | Type     | Description                | Required        | Default         |
| :-------- | :------- | :------------------------- | :-------------- | :-------------- |
| `reference` | `string` | A public reference (name) given with every resource the identifier will create/update. |   Yes (Must be unique)    | -     |

> [!IMPORTANT]
>
> If the `personal` identifier (UUID) is lost, it can not be recovered through the api itself.
>
> Anyone with access to an identifier can manage its resources.
  
</details>
<br>

<details>
<summary>Videos</summary>

#### Adding videos to a watchlist
  
```http
   POST \API\v1\videos
```
  
| Parameter | Type     | Description                | Required        | Default         |
| :-------- | :------- | :------------------------- | :-------------- | :-------------- |
| `identifier` | `string(UUID)` | A `personal` identifier.               | Yes       | -  |
| `watchlist` | `string(UUID) or integer(ID)` | A `watchlist` identifier or ID. | Yes | -  |
| `name` | `string` | The name of the video you want add. | Yes | -  |
| `url` | `string` | The url of the video you want to add. (only allows certain !!!!!!platforms) | Yes | -  |


  
</details>



# Ra-Pi

Rekap Kopi


## Installation

Clone the project

```bash
  git clone https://github.com/SideeID/Ra-Pi.git
```

Or
```bash
  git pull https://github.com/SideeID/Ra-Pi.git main
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies
```bash
  composer install
```
<!-- * If composer install error
```bash
  composer install --ignore-platform-req=php
``` -->

```bash
  npm install
```


## Environment Variables

To run this project, you will need copy .env.example to .env
```bash
  cp .env.example .env
```
Generate APP Key with artisan
```bash
  php artisan key:generate
```

## Migrate
```bash
  php artisan migrate --seed
```

## Run locally
Start the vite

```bash
  npm run dev
```

Start the laravel
```bash
  php artisan serve
```

## Tech Stack

**Client:** Blade, TailwindCSS

**Server:** Node, Laravel, Vite

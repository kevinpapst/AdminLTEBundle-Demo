# AdminLTE-Bundle Demo

This repository contains an example Symfony 4 application for the [AdminLTE-Bundle](https://github.com/kevinpapst/AdminLTEBundle).

It serves as a living documentation for first time users and easier testing of theme features.

Please read the [theme documentation](https://github.com/kevinpapst/AdminLTEBundle/blob/master/Resources/docs/) for more information on how to use this theme.


# Installation

Two steps:

```bash
git clone https://github.com/kevinpapst/AdminLTEBundle-Demo.git
```

and then install all composer dependencies:

```bash
cd AdminLTEBundle-Demo
composer install
```

Now spin up the PHP built-in webserver:

```bash
bin/console server:run
```

and see it running at [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Frontend assets

If you want to re-compile the frontend assets execute:

```
yarn install
npm run build
```

## Testing different languages

To change the language, you need to edit the file `config/services.yaml` and change from `locale: 'en'` to something like `locale: 'ar'`.

Be aware that ONLY the Admin theme translation will change (like the login screen and toolbar dropdowns), the demo itself is not translated! 

## Real world examples

If you want to see the theme in action (in a real world application), checkout my Symfony 4 based time-tracking application **Kimai 2** at:
https://github.com/kevinpapst/kimai2



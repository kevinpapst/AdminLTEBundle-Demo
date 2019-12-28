# AdminLTE-Bundle Demo

This repository contains an example Symfony 4 application for the [AdminLTE-Bundle](https://github.com/kevinpapst/AdminLTEBundle).

It serves as a living documentation for first time users and easier testing of theme features.

Please read the [theme documentation](https://github.com/kevinpapst/AdminLTEBundle/blob/master/Resources/docs/) for more information on how to use this theme.


# Installation

Simple as that:

```bash
composer create-project kevinpapst/adminlte-bundle-demo
```

I use the Symfony webserver, which is a great development tool, please read how to install it at:
[https://symfony.com/doc/current/setup/symfony_server.html](https://symfony.com/doc/current/setup/symfony_server.html)

```bash
cd adminlte-bundle-demo
symfony serve
```

and see it running at [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Frontend assets

If you want to re-compile the frontend assets execute:

```
yarn install
npm run build
```

## Testing different languages

**Be aware that ONLY the theme translations will change (like login screen and toolbar dropdowns), the demo itself is not translated!** 

- Simple solution: This demo supports locales via URLs, use the dropdown in the pages head navigation.
- Permanent solution: Edit the file `config/services.yaml` and change from `locale: 'en'` to something like `locale: 'ar'`.

## Real world examples

If you want to see the theme in action (in a real world application), checkout my Symfony 4 based time-tracking application **Kimai 2** at:
https://github.com/kevinpapst/kimai2

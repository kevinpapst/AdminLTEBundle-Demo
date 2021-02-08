# AdminLTE-Bundle Demo

This repository contains an example Symfony 4 application for the [AdminLTE-Bundle](https://github.com/kevinpapst/AdminLTEBundle).

It serves as a living documentation for first time users and easier testing of theme features.

Please read the [theme documentation](https://github.com/kevinpapst/AdminLTEBundle/blob/master/Resources/docs/) for more information on how to use this theme.


# Installation

Simple as that:

```bash
composer create-project kevinpapst/adminlte-bundle-demo
```

Use the [Symfony binary](https://symfony.com/download) to quickly start up a development server:

```bash
cd adminlte-bundle-demo
SHELL_VERBOSITY=2 symfony serve
```

## Frontend assets

If you want to re-compile the frontend assets execute:

```
yarn install
yarn run build
```

## Testing different languages

**Be aware that ONLY the theme translations will change (like login screen and toolbar dropdowns), the demo itself is not translated!** 

- Simple solution: This demo supports locales via URLs, use the dropdown in the pages head navigation.
- Permanent solution: Edit the file `config/services.yaml` and change from `locale: 'en'` to something like `locale: 'ar'`.

## Real world examples

If you want to see the theme in action (in a real world application), checkout my [time-tracking application Kimai](https://github.com/kevinpapst/kimai2).

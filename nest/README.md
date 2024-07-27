<p align="center">
  <a href="http://nestjs.com/" target="blank"><img src="https://nestjs.com/img/logo-small.svg" width="200" alt="Nest Logo" /></a>
</p>

[circleci-image]: https://img.shields.io/circleci/build/github/nestjs/nest/master?token=abc123def456
[circleci-url]: https://circleci.com/gh/nestjs/nest

  <p align="center">A progressive <a href="http://nodejs.org" target="_blank">Node.js</a> framework for building efficient and scalable server-side applications.</p>
    <p align="center">
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/v/@nestjs/core.svg" alt="NPM Version" /></a>
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/l/@nestjs/core.svg" alt="Package License" /></a>
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/dm/@nestjs/common.svg" alt="NPM Downloads" /></a>
<a href="https://circleci.com/gh/nestjs/nest" target="_blank"><img src="https://img.shields.io/circleci/build/github/nestjs/nest/master" alt="CircleCI" /></a>
<a href="https://coveralls.io/github/nestjs/nest?branch=master" target="_blank"><img src="https://coveralls.io/repos/github/nestjs/nest/badge.svg?branch=master#9" alt="Coverage" /></a>
<a href="https://discord.gg/G7Qnnhy" target="_blank"><img src="https://img.shields.io/badge/discord-online-brightgreen.svg" alt="Discord"/></a>
<a href="https://opencollective.com/nest#backer" target="_blank"><img src="https://opencollective.com/nest/backers/badge.svg" alt="Backers on Open Collective" /></a>
<a href="https://opencollective.com/nest#sponsor" target="_blank"><img src="https://opencollective.com/nest/sponsors/badge.svg" alt="Sponsors on Open Collective" /></a>
  <a href="https://paypal.me/kamilmysliwiec" target="_blank"><img src="https://img.shields.io/badge/Donate-PayPal-ff3f59.svg"/></a>
    <a href="https://opencollective.com/nest#sponsor"  target="_blank"><img src="https://img.shields.io/badge/Support%20us-Open%20Collective-41B883.svg" alt="Support us"></a>
  <a href="https://twitter.com/nestframework" target="_blank"><img src="https://img.shields.io/twitter/follow/nestframework.svg?style=social&label=Follow"></a>
</p>
  <!--[![Backers on Open Collective](https://opencollective.com/nest/backers/badge.svg)](https://opencollective.com/nest#backer)
  [![Sponsors on Open Collective](https://opencollective.com/nest/sponsors/badge.svg)](https://opencollective.com/nest#sponsor)-->

## Description

Mobile App Mypage Backend(recreated by NestJS from Laravel)

## Installation

1. download pnpm(v^8.15) to your computer

```bash
$ npm install -g pnpm
```

2. install package at root dir

```bash
$ pnpm install
```

3. build docker image at root dir

```bash
$ docker-compose build --no-cache
```

4. create docker network

```bash
$ docker network create mobile_nest_network
```

5. start docker contaner

```bash
$ docker-compose up
```

7. open new bash

8. go inside the container

```bash
$ docker exec -it /mobile-nest ash
```

9. generate schema types(inside the container)

```bash
$ pnpm prisma:generate
```

10. generate old db schema types(inside the container)

```bash
$ pnpm old_prisma:generate
```

11. migrate main table(inside the container)

```bash
$ pnpm prisma:migrate
```

12. [import old db data](#old_db)

<a id="old_db"></a>

## import old db data

1. open phpmyadmin(localhost:8081) on your browser
2. press "インポート" button　<br> ![press "インポート" button](https://github.com/global-trust-networks/mobile-nest/assets/57791847/c9dcd74a-42fd-4b17-9954-30cdb812b3f1)
3. select file1　<br> ![select file1](https://github.com/global-trust-networks/mobile-nest/assets/57791847/10c56e37-ce81-4c57-9959-b597cf1fc260)
4. turn off "外部キーのチェックを有効にする" <br> ![turn off "外部キーのチェックを有効にする"](https://github.com/global-trust-networks/mobile-nest/assets/57791847/e213122f-3e95-4c2c-bcef-f47bfff947c9)
5. import
6. press "インポート" button　<br> ![press "インポート" button](https://github.com/global-trust-networks/mobile-nest/assets/57791847/c9dcd74a-42fd-4b17-9954-30cdb812b3f1)
7. select file2　<br> ![select file2](https://github.com/global-trust-networks/mobile-nest/assets/57791847/10c56e37-ce81-4c57-9959-b597cf1fc260)
8. turn off "外部キーのチェックを有効にする" ![turn off "外部キーのチェックを有効にする"](https://github.com/global-trust-networks/mobile-nest/assets/57791847/e213122f-3e95-4c2c-bcef-f47bfff947c9)

## Running the app

```bash
$ docker-compose up
```

## When install new package(ribrary)

1. add package(inside the container)

```bash
pnpm add ${package_name}
```

2. stop container

```bash
control + c
```

3. let vs-code detect the package

```bash
$ pnpm i
```

## When other person add new package(ribrary)

1. add package(inside the container)

```bash
pnpm i
```

2. stop container

```bash
control + c
```

3. let vs-code detect the package

```bash
$ pnpm i
```

## Run nest-command

1. go inside the container

```bash
$ docker exec -it /mobile-nest ash
```

2. run command

```bash
$ pnpm command ${command_name}
```

## Get Mobile-App Access Token

1. create some records to your DB.(needle: plan_groups, plans, profiles, visas, addresses, sims)

profiles(if you have own account on Auth0, you have to use the same id)<br>

[base_data.sql](https://drive.google.com/drive/folders/1kezx0N6a_cvfieLhdkmAHbLot3NCurCR?usp=sharing)

２. get token from Auth0 extension.<br>
https://docs.google.com/document/d/1HvsZZRBxJS6QORkbyQOSJABZq8oxhyKdLRD_jT02pUg/edit

## Test

```bash
# unit tests
$ pnpm run test

# e2e tests
$ pnpm run test:e2e

# test coverage
$ pnpm run test:cov
```

## Support

Nest is an MIT-licensed open source project. It can grow thanks to the sponsors and support by the amazing backers. If you'd like to join them, please [read more here](https://docs.nestjs.com/support).

## Stay in touch

- Author - [Kamil Myśliwiec](https://kamilmysliwiec.com)
- Website - [https://nestjs.com](https://nestjs.com/)
- Twitter - [@nestframework](https://twitter.com/nestframework)

## License

Nest is [MIT licensed](LICENSE).

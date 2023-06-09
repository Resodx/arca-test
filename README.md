<h1  align="center">ARCA TEST</h1>

## Introduction
### Requirements
- [Git](https://git-scm.com/)
- [WSL2](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
### Technologies
- [PHP 8.1](https://www.php.net/releases/8.1/en.php)
- [Symfony 5.3](https://symfony.com/doc/current/index.html)
- [Composer](https://getcomposer.org/)
- [Sonata Admin](https://sonata-project.org/)
- [Doctrine](https://www.doctrine-project.org/)
- [Twig](https://twig.symfony.com/)
- [Bootstrap 5](https://getbootstrap.com/)
- [Foundry](https://github.com/zenstruck/foundry)
- [Nginx](https://www.nginx.com/)
- [MariaDB](https://mariadb.org/)
- [Elasticsearch](https://www.elastic.co/pt/elasticsearch/)

### Bundles
- [KnpPaginatorBundle](https://github.com/KnpLabs/KnpPaginatorBundle)
- [KnpMenuBundle](https://github.com/KnpLabs/KnpMenuBundle)
- [Zenstruck\Foundry](https://github.com/zenstruck/foundry)
- [FOSElasticaBundle](https://github.com/FriendsOfSymfony/FOSElasticaBundle)
### About


## Installation

### Development Enviroment (Docker)

**NOTE: If you are using Windows, you must have the [WSL2](https://docs.microsoft.com/en-us/windows/wsl/install-win10) installed and configured.**

Follow the steps to create the ``development`` environment.

- Clone the repository and enter the project folder:
```sh
git clone git@github.com:Resodx/arca-test.git && cd arca-test
```

#### Docker Compose
- Open the terminal in the root folder of the project and run the command:
```sh
docker-compose up -d --build
```

#### Default Admin User
```sh
username: admin
password: admin
```
### URLs
- [http://localhost:8080](http://localhost:8080) - Application
- [http://localhost:8080/api](http://localhost:8080/api) - Swagger API Documentation
- [http://localhost:8080/admin](http://localhost:8080/admin) - Sonata Admin

## Gitflow

  

The work flow in this codebase is based on [Gitflow](https://datasift.github.io/gitflow/IntroducingGitFlow.html). This is a branching model for Git, created by Vincent Driessen. It has attracted a lot of attention because it is very well suited to collaboration and scaling the development team.

  

### Work Type Abbreviation

-  `feat`: Features, functionalities;

-  `enhanc`: Enhancement, features improvements;

-  `chore`: Chore, general and common work;

-  `fix`: Bugfix, Hotfix, troubleshooting in general.

  

### Semantic Naming

Semantic naming helps developers and others stakeholders on identify and track work done.

  

#### Branches

Main work is represented by branch. A branch name should follow the pattern below:

  

`"{workTypeAbbreviation}/{semantic}-{description}-{separatedBy}-{dash}"`

  

Ex.: `feat/home-calendar`, `enhanc/home-calendar-styles`, `fix/home-calendar-button`, `chore/gitflow-docs`

  

#### Commits

An work step is represented by commit. A commit message should follow the pattern below:

  

`"{workTypeAbbreviation}: {semanticDescription}"`

  

Ex.: `feat: home calendar main component implemented`, `enhanc: home calendar main component styles updated`, `fix: home calendar button onclick fixed`

  

#### PRs

A work submission is represented by Pull Request - PR. A PR title should follow the pattern below:

  

`"{workType}: {semanticDescription}"`

  

Ex.: `Feature: Home Calendar` (would copy/paste branch name and adapt)

## Instalação

Após clonar o repositório entre na pasta /backend_comunicados

Para instalar as dependencias execute:

```bash
  composer install
```

Duplique o arquivo .env.example e renomeie-o para .env:

```bash
  cp .env.example .env
```

Configure as variáveis de ambiente para usar o SQLite no arquivo .env:

```bash
  DB_CONNECTION=sqlite
  DB_DATABASE=/absolute/path/para/database/database.sqlite
  DB_FOREIGN_KEYS=true
```

Criar o Arquivo database.sqlite:

-   Navegue até a pasta database/ do projeto.
-   Crie um arquivo vazio chamado database.sqlite:

```bash
  touch database/database.sqlite
```

Gerar a Chave do Aplicativo

```bash
  php artisan key:generate
```

Rodar as Migrations e Seeds

```bash
  php artisan migrate --seed
```

Rodar o servidor

```bash
  php artisan serve
```

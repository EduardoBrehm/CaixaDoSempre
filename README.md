# CaixaDoSempre

Uma plataforma romântica para casais criarem e compartilharem cápsulas do tempo digitais, guardando memórias especiais para serem revividas em momentos importantes do relacionamento.

## Sobre o Projeto

O CaixaDoSempre é um espaço onde casais podem:
- Criar cápsulas do tempo digitais com mensagens, fotos e promessas
- Definir datas especiais para abrir cada cápsula (aniversários, casamento, etc)
- Guardar memórias de forma segura e privada
- Reviver momentos especiais juntos

## Tecnologias

- Laravel 10.x
- PHP 8.1+
- MySQL
- Tailwind CSS
- Alpine.js

## Requisitos

- PHP 8.1 ou superior
- Composer
- Node.js e NPM
- MySQL

## Instalação

1. Clone o repositório
```bash
git clone https://github.com/EduardoBrehm/CaixaDoSempre.git
cd CaixaDoSempre
```

2. Instale as dependências
```bash
composer install
npm install
```

3. Configure o ambiente
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=caixadosempre
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

5. Execute as migrações
```bash
php artisan migrate
```

6. Compile os assets
```bash
npm run dev
```

7. Inicie o servidor
```bash
php artisan serve
```

## Contribuindo

Contribuições são sempre bem-vindas! Por favor, leia o guia de contribuição antes de submeter mudanças.

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

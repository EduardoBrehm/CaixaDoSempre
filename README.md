# Enrol.ai

Um SaaS que cria textos longos, formais e inteligentes que parecem extremamente bem elaborados.

## Sobre o Projeto

O Enrol.ai é uma ferramenta poderosa para gerar textos formais e sofisticados, ideal para:
- E-mails corporativos
- Relatórios profissionais
- Trabalhos acadêmicos

## Tecnologias Utilizadas

- Laravel 11.x
- PHP 8.2+
- MySQL 8.0
- Docker & Docker Compose
- Tailwind CSS
- Nginx

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/EduardoBrehm/Enrola.ai.git
cd Enrola.ai
```

2. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

3. Inicie os containers Docker:
```bash
docker-compose up -d
```

4. Instale as dependências e configure o projeto:
```bash
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
```

## Uso

Acesse http://localhost:8000 e comece a gerar textos impressionantes!

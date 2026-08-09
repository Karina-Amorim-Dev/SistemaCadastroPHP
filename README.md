# Sistema de Cadastros (PHP)

Uma aplicação simples de CRUD para demonstrar cadastro e gerenciamento de entidades comuns (Produtos, Clientes, Funcionários, Livros, Veículos e Filmes). Projetada para uso local como exemplo didático de PHP + MySQL com páginas PHP tradicionais (server-side rendering).

---

## Stack
- Linguagem: PHP (puro, sem frameworks)
- Front-end: HTML + CSS simples (arquivo `estilo.css`)
- Banco de dados: MySQL / MariaDB (arquivo de criação: `banco.sql`)

---

## Recursos
- Listar, cadastrar, editar e excluir registros para:
  - Produtos
  - Clientes
  - Funcionários
  - Livros
  - Veículos
  - Filmes
- Busca simples por nome/título (query LIKE)
- Estrutura de arquivos por entidade (cada pasta tem `index.php`, `cadastrar.php`, `editar.php`, `atualizar.php`, `excluir.php`)

---

## Pré-requisitos
- PHP 7.4+ (ou versão compatível)
- MySQL / MariaDB
- Navegador web
- Opcional: XAMPP, WAMP, MAMP ou outro ambiente local de desenvolvimento PHP

---

## Instalação e execução local (passo a passo)

1. Clone o repositório:
   ```
   git clone https://github.com/Karina-Amorim-Dev/SistemaCadastroPHP.git
   cd SistemaCadastroPHP
   ```

2. Crie o banco de dados e as tabelas:
   - Pela linha de comando (substitua `root` e a senha conforme seu ambiente):
     ```
     mysql -u root -p
     CREATE DATABASE sistema_cadastros CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
     exit
     mysql -u root -p sistema_cadastros < banco.sql
     ```
   - Ou importe `banco.sql` via phpMyAdmin ou outra ferramenta.

3. Configure a conexão com o banco:
   - Há um arquivo `conexao.php` na raiz com credenciais padrão:
     ```php
     $servidor = "127.0.0.1";
     $usuario = "root";
     $senha = "12345678";
     $banco = "sistema_cadastros";
     $porta = 3306;
     ```
   - Atualize esses valores conforme seu ambiente (ou use a abordagem recomendada abaixo para variáveis de ambiente).

4. Execute o servidor PHP embutido (opção rápida):
   ```
   php -S 127.0.0.1:8000 -t .
   ```
   Depois abra: http://127.0.0.1:8000/index.php

5. Ou coloque a pasta do projeto dentro de `htdocs` (XAMPP) / `www` (WAMP) e acesse pelo Apache local.

---

## Estrutura do repositório (anotada)
```
index.php             # Menu principal — links para cada módulo
estilo.css            # Estilos globais
conexao.php           # Parâmetros e criação da conexão MySQL (mysqli)
banco.sql             # Script SQL para criação das tabelas e dados iniciais
Clientes/             # Módulo Clientes: index.php, cadastrar.php, editar.php, atualizar.php, excluir.php
Produtos/             # Módulo Produtos
Funcionarios/         # Módulo Funcionários
Livros/               # Módulo Livros
Veiculos/             # Módulo Veículos (observação: arquivo de exclusão tem nome 'exclir.php' no repositório)
Filmes/               # Módulo Filmes
```

Como funciona em tempo de execução:
- `index.php` redireciona para os `index.php` de cada módulo.
- Cada módulo tem formulário de cadastro que envia para `cadastrar.php` (POST).
- Listagem/Busca realiza SELECT com `LIKE` usando o parâmetro `busca` (GET).
- Edição usa `editar.php` para carregar dados e `atualizar.php` para persistir mudanças.
- Exclusão chama `excluir.php` (há uma confirmação via `onclick` no link).

---

## Observações importantes / Pontos detectados no código
- O arquivo `conexao.php` contém credenciais hardcoded:
  - Host: `127.0.0.1`
  - Usuário: `root`
  - Senha: `12345678`
  - Banco: `sistema_cadastros`
  - Porta: `3306`
  Atualize essas informações antes de rodar em produção.
- Há risco de SQL Injection: as consultas atuais concatenam diretamente variáveis do usuário (ex.: `WHERE nome LIKE '%$busca%'`), recomenda-se usar prepared statements.
- Em `Veiculos/` o arquivo de exclusão está nomeado `exclir.php` (provável erro de digitação). Verifique e corrija para `excluir.php` para consistência.
- Não há controle de autenticação — o sistema é aberto. Adicione login/roles se necessário.
- Não há tratamento avançado de erros nem logging estruturado — apenas exibição de erros via PHP.

---

## Segurança e boas práticas recomendadas
1. Não deixar credenciais no código:
   - Use variáveis de ambiente (ex.: via arquivo `.env`) e não comite credenciais.
   - Exemplo simples de mudança para usar env:
     ```php
     $servidor = getenv('DB_HOST') ?: '127.0.0.1';
     $usuario  = getenv('DB_USER') ?: 'root';
     $senha    = getenv('DB_PASS') ?: '';
     $banco    = getenv('DB_NAME') ?: 'sistema_cadastros';
     $porta    = getenv('DB_PORT') ?: 3306;
     $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);
     ```
2. Use prepared statements (mysqli->prepare ou PDO) para todas as operações que recebem input do usuário.
3. Escape/encode saída HTML onde necessário para evitar XSS:
   - `htmlspecialchars($valor, ENT_QUOTES, 'UTF-8')`
4. Valide e sanitize dados de entrada (seriais, emails, números, etc).
5. Considere migrar para PDO e encapsular a camada de dados (Repository/DAO).
6. Habilite exibição de erros apenas em desenvolvimento. Em produção, desative display_errors e registre logs.

---

## Sugestões de melhorias / roadmap
- Substituir mysqli por PDO com prepared statements.
- Adicionar autenticação básica (login) e permissões.
- Implementar paginação nas listagens.
- Usar um front-end mínimo com templates (Blade/Twig) ou separar lógica em controllers/views (padrão MVC).
- Implementar testes automatizados (PHPUnit) para lógica crítica.
- Configurar CI (GitHub Actions) para linters e testes.
- Adicionar arquivo LICENSE (ex.: MIT) se for open source.

---

## Exemplo de mudança rápida: usar PDO e prepared statement (inserção de cliente)
```php
// Exemplo ilustrativo: arquivo Clientes/cadastrar.php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=sistema_cadastros;charset=utf8mb4', 'root', 'senha');
$stmt = $pdo->prepare('INSERT INTO clientes (nome, email, telefone, endereco) VALUES (:nome, :email, :telefone, :endereco)');
$stmt->execute([
  ':nome' => $_POST['nome'],
  ':email' => $_POST['email'],
  ':telefone' => $_POST['telefone'],
  ':endereco' => $_POST['endereco'],
]);
header('Location: index.php');
exit;
```

---

## Como contribuir
- Abra uma issue descrevendo o bug ou melhoria desejada.
- Faça um fork, crie uma branch de feature/bugfix, submeta um pull request com descrição clara.
- Siga as recomendações de segurança (não comite credenciais).

---

## Licença
- Sem licença especificada no repositório. Recomenda-se adicionar um arquivo `LICENSE` (por exemplo MIT) se deseja tornar o projeto open-source. Enquanto a licença não estiver definida, o código não tem direitos explícitos concedidos a terceiros.

---

## Contato / Créditos
- Autor: Karina Amorim (repositório: Karina-Amorim-Dev)
- Para dúvidas ou melhorias, abra uma issue no repositório.

---

## Changelog resumido
- v1.0 — Estrutura inicial com CRUD para Produtos, Clientes, Funcionários, Livros, Veículos e Filmes. (Data conforme commit inicial)

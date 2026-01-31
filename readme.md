# 💱 Conversor de Moedas Pro

Um conversor de moedas moderno e responsivo, desenvolvido com foco em **arquitetura limpa (MVC)**, **experiência do usuário (UX)** e **integração com API de câmbio em tempo real**.

## 💡 Funcionalidades Principais

*   **Conversão em Tempo Real:** Utiliza a API Frankfurter para obter as taxas de câmbio mais recentes.
*   **Teclado Numérico Customizado:** Componente de interface dedicado para facilitar a entrada de valores, especialmente em dispositivos móveis.
*   **Inversão Rápida:** Botão dedicado para trocar as moedas de origem e destino instantaneamente.
*   **Design Responsivo:** Interface otimizada para visualização em diferentes tamanhos de tela, utilizando **Bootstrap** e **CSS customizado**.
*   **API-First:** A lógica de conversão é exposta via endpoint POST, permitindo fácil integração com o frontend via AJAX.

## 🛠️ Tecnologias Utilizadas

| Categoria | Tecnologia | Propósito |
| :--- | :--- | :--- |
| **Backend** | PHP (Puro) | Lógica de negócio e roteamento (MVC). |
| **Frontend** | HTML5, CSS3 | Estrutura e estilização. |
| **Framework CSS** | Bootstrap 5 | Componentes e sistema de grid. |
| **Interatividade** | JavaScript (jQuery) | Requisições AJAX e manipulação do DOM. |
| **API Externa** | Frankfurter API | Obtenção de taxas de câmbio. |

## 🚀 Como Iniciar o Projeto

O projeto foi configurado para ser executado de forma simples, utilizando o servidor embutido do PHP.

### Pré-requisitos

Certifique-se de ter o **PHP** instalado em sua máquina (versão 7.4 ou superior é recomendada).

### Passos para Execução

1.  **Navegue até a pasta raiz do projeto:**
    ```bash
    cd /caminho/para/conversor_moeda
    ```

2.  **Inicie o servidor embutido do PHP:**
    É **fundamental** que o servidor seja iniciado apontando para a pasta `public`, pois ela contém o `index.php` que atua como o **ponto de entrada** (Front Controller) da aplicação.

    ```bash
    php -S localhost:8000 -t public
    ```

3.  **Acesse a Aplicação:**
    Abra seu navegador e acesse o endereço:
    ```
    http://localhost:8000
    ```

## 🏗️ Arquitetura e Estrutura

O projeto segue o padrão **Model-View-Controller (MVC)**, garantindo a separação de responsabilidades e a manutenibilidade do código.

### Estrutura de Pastas

| Pasta | Conteúdo | Responsabilidade |
| :--- | :--- | :--- |
| `public/` | Ponto de entrada (`index.php`), assets (CSS, JS). | **Front Controller** e arquivos estáticos. |
| `app/controllers/` | `ConversaoController.php`. | Recebe requisições e coordena a lógica. |
| `app/core/` | `Router.php`. | Gerencia as rotas GET e POST da aplicação. |
| `app/services/` | `CambioService.php`. | Lógica de negócio, como a comunicação com a API externa. |
| `app/views/` | `dashboard.php` e componentes. | Camada de apresentação (HTML). |

### Destaques de Código

#### 1. Roteamento (Router.php)

O arquivo `public/index.php` inicializa o roteador (`Router.php`), que direciona todas as requisições para o controlador e método apropriados.

#### 2. Serviço de Câmbio (CambioService.php)

A classe `CambioService` é responsável por encapsular a lógica de comunicação com a API externa.

```php
// app/services/CambioService.php
class CambioService
{
    public function converter($origem, $destino, $valor)
    {
        // ...
        $url = "https://api.frankfurter.app/latest?amount=$valor&from=$origem&to=$destino";
        $resposta = file_get_contents($url);
        // ...
    }
}
```

#### 3. Componentização

A interface é modularizada, com componentes reutilizáveis:
*   `card-conversor.php`: O layout principal do conversor.
*   `teclado-numerico.php`: O componente do teclado.

#### 4. Interatividade (converter.js)

O arquivo `public/assets/js/converter.js` gerencia a interação do usuário, utilizando AJAX para enviar os dados de conversão para o endpoint `/converter` (tratado pelo `ConversaoController`) sem recarregar a página.

---
Desenvolvido por jvva

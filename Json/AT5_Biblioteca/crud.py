import json

def menu(): # Exibe as opções principais do sistema
    print("\n====== MENU ======") 
    print("1. Cadastrar Livro")
    print("2. Listar Livros")
    print("3. Atualizar Livro")
    print("4. Remover Livro")
    print("5. Biblioteca")
    print("6. Sair")
    print("====================\n")

def escolher_genero(): # Filtra a categoria para as operações
    print("\n====== GÊNERO ======")
    print("1. Romance")
    print("2. Mistério")
    print("3. Ficção Científica")
    print("=====================\n")

    opcao = input("Escolha uma opção: ") # O usuário escolhe a opção do gênero do livro

    if opcao == "1":
        return "romance"
    
    elif opcao == "2":
        return "misterio"
    
    elif opcao == "3":
        return "ficcao"

    else:
        print("Opção Inválida!")

def ler_dados(): # Carrega o dicionário do arquivo JSON
    with open("genero.json", "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)
    
def salvar_dados(dados): # Escreve por cima do arquivo com os dados atualizados
    with open("genero.json", "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, indent=2, ensure_ascii=False)

def adicionar():# Adiciona um novo livro ao gênero escolhido pelo usuário
    genero = escolher_genero()
    if not genero:
        return
    
    titulo = input("Título: ")
    autor = input("Autor: ")

    dados = ler_dados()
    dados[genero].append({
        "titulo": titulo,
        "autor": autor
    })

    salvar_dados(dados)
    print("Livro Adicionado na Biblioteca!")

def listar(): # Listar os livros de um gênero escolhido pelo usuário. 
    genero = escolher_genero()
    if not genero:
        return
    
    dados = ler_dados()
    print(f"Lista de {genero.upper()}:")
    
    for codigo, livro in enumerate(dados[genero], start=1): #O "enumerate()" é usado para iterar a lista de livros do gênero escolhido, fornecendo um índice ao livro correspondente em cada iteração
        print(f"{codigo}. {livro.get('titulo')} - {livro.get('autor')}")

def atualizar(): # Através da informação do índece, vamos poder alterar ele
    genero = escolher_genero()

    if not genero:
        return
    
    dados = ler_dados()

    codigo = int(input("Indice do contato: ")) -1

    if 0 <= codigo < len(dados[genero]):
        novo_titulo = input("Novo Titulo: ")
        novo_autor = input("Novo Autor: ")

        dados[genero][codigo] = {
            "titulo": novo_titulo,
            "autor": novo_autor
        }
        salvar_dados(dados)
        print("Livro Atualizado na Biblioteca!")

    else: 
        print("Código Inválido...")

def remover(): # Seguindo o mesmo esquema do atualizar, esse vai remover
    genero = escolher_genero()
    if not genero:
        return
    
    dados = ler_dados()

    codigo = int(input("Código do Livro: ")) -1

    if 0 <= codigo < len(dados[genero]):
        dados[genero].pop(codigo)

        salvar_dados(dados)
        print("Livro Removido")
        
    else:
        print("Código Inválido...")

def biblioteca(): # Vai listar todos os livros presentes na Biblioteca
    dados = ler_dados()
    print("\n========== BIBLIOTECA ==========")
    encontrou_livro = False
    
    # Percorre cada gênero
    for genero, lista_livros in dados.items():
        if lista_livros:
            encontrou_livro = True
            print(f"\n--- {genero.upper()} ---")
            for i, livro in enumerate(lista_livros, start=1):
                titulo = livro.get('titulo', 'Sem título')
                autor = livro.get('autor', 'Sem autor')
                print(f"{i}. {titulo} - {autor}")
    
    if not encontrou_livro:
        print("A biblioteca está vazia no momento.")
    print("\n====================================")

def main(): # Valida a opção escolhida pelo usuário para acessar a informação requerida 
    while True:
        menu()
        opcao = input("Escolha: ")
        if opcao == "1":
            adicionar()

        elif opcao == "2":
            listar()

        elif  opcao == "3":
            atualizar()

        elif opcao == "4":
            remover()

        elif opcao == "5":
            biblioteca()

        elif opcao == "6":
            print("Saindo...")
            break
        else: 
            print("Opção Inválido!")

# Executa o programa
main()
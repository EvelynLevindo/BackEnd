import json

# Menu Principal
def menu():

    print("\n=== MENU DE CONTATOS ===")
    print("1- Adicionar Contato")
    print("2- Listar Contatos")
    print("3- Atualizar Contato")
    print("4- Excluir")
    print("5- Sair")
    print("=========================\n")

# Função para escolher entre professores e alunos
def escolher_grupo():
    # Pergunta ao usuário o grupo que deseja retornar
    print("\nTipo de Contato: ")
    print("1 - Aluno")
    print("2 - Professor")

    opcao = input("Escolha: ")

    if opcao == "1":
        return "alunos"
    
    elif opcao == "2":
        return "professores"
    
    else:
        print("Opção Inválida!")

# Função para ler os dados do JSON
def ler_dados():
    with open("contatos.json", "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)

# Função salvar dados
def salvar_dados(dados):
    with open("contatos.json", "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, indent=2, ensure_ascii=False)

# Adicionar dados
def adicionar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    nome = input("Nome: ")
    telefone = input("Telefone: ")

    dados = ler_dados()

    dados[grupo].append({
        "nome": nome,
        "telefone": telefone
    })
    
    salvar_dados(dados)
    print("Contato Adicionado!")

# Função listar contatos
def listar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    dados = ler_dados()
    print(f"\nLista de {grupo.upper()}: ")

    for index, contato in enumerate(dados[grupo], start=1): # Vai fazer com que o indice seja enumerado em cada grupo
        print(f"{index}. {contato['nome']} - {contato['telefone']}")

# Atualizar
def atualizar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    dados = ler_dados()

    index = int(input("Indice do contato: ")) -1

    if 0 <= index < len(dados[grupo]):
        nome = input("Novo Nome: ")
        telefone = input("Novo Telefone: ")

        dados[grupo][index] = {
            "nome": nome,
            "telefone": telefone
        }
        salvar_dados(dados)
        print("Contato Atualizado!")

    else: 
        print("Índice Inválido...")

# Função para excluir
def excluir():
    grupo = escolher_grupo()
    if not grupo:
        return
    
    dados = ler_dados()

    index = int(input("Indice do contato: ")) -1

    # Verificar se o index é válido
    if 0 <= index < len(dados[grupo]):
        # Remove o elemento da matriz
        dados[grupo].pop(index)

        salvar_dados(dados)
        print("Contato Excluído!")

    else:
        print("Indice Inválido!")

# Menu Principal
def main():
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
            excluir()

        elif opcao == "5":
            print("Saindo...")
            break
        else: 
            print("Opção Inválido!")

# Executa o programa
main()
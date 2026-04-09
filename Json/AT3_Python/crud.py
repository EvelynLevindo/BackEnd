# IMPORTANTE: Se rodar este código direto no RUN, vai criar um outro arquivo fora da pasta deste arquivo, mas se rodar pelo terminal ("python .\nome_arquivo.py") vai usar seu próprio arquivo JSON criado.

import json
import os

# Função para carregar o arquivo JSON
def carregar_dados(): 
    # Se o arquivo não existir, retorna uma lista vazia
    if not os.path.exists("dados.json"):
        return[]
    
    # Abre o arquivo em modo leitura
    with open("dados.json", "r", encoding="utf-8") as arquivo:
        # Onde o "r" é para abrir o arquivo somente leitura (READ)
        return json.load(arquivo)
    
# Função para salvar os dados que vão sendo alterados pelo usuário no JSON
def salvar_dados(dados):
    # Abre o arquivo em modo escrita
    with open("dados.json", "w", encoding="utf-8") as arquivo:
        # Onde o "w" é escrever (WRITE)
        # "indent" para deixar o JSON organizado
        json.dump(dados, arquivo, indent=4, ensure_ascii=False)

def criar_pessoa(nome, idade):
    dados = carregar_dados()
    
    # Gera um ID simples
    novo_id = 1
    if dados:
        novo_id = dados[-1]["id"] +1
    pessoa = {
        "id": novo_id,
        "nome": nome,
        "idade": idade
    }

    dados.append(pessoa)
    salvar_dados(dados)

    print("Pessoa Cadastrada!")

def listar_pessoas():
    dados = carregar_dados()

    if not dados:
        print("Nenhum registro encontrado...")
        return
    
    for pessoa in dados:
        print(f"ID: {pessoa['id']} | Nome: {pessoa['nome']} | Idade: {pessoa['idade']}")

def atualizar_pessoa(id, novo_nome, nova_idade):
    dados = carregar_dados()

    for pessoa in dados:
        if pessoa["id"] == id:
            pessoa["nome"] = novo_nome
            pessoa["idade"] = nova_idade
            salvar_dados(dados)
            print("Pessoa Atualizada!")
            return
    print("ID não encontrado...")

def deletar_pessoa(id):
    dados = carregar_dados()

    # Cria nova lista sem informar o ID
    dados = [pessoa for pessoa in dados if pessoa["id"] != id] # Ternário
    # Vai percorrer todas as pessoas e imprimir na tela, somente as que tiverem o ID diferente do informado pello usuário

    salvar_dados(dados)
    print("Pessoa Removida!")

while True:
    print("\n=====================")
    print("1 - Cadastrar")
    print("2 - Listar")
    print("3 - Atualizar")
    print("4 - Deletar")
    print("5 - Sair")
    print("=====================\n")
    opcao = input("Escolha: ")

    if opcao == "1":
        nome = input("Nome: ")
        idade = int(input("Idade: "))
        criar_pessoa(nome, idade)

    elif opcao == "2":
        listar_pessoas()

    elif opcao == "3":
        id = int(input("ID: "))
        nome = input("Novo Nome: ")
        idade = int(input("Nova Idade: "))
        atualizar_pessoa(id, nome, idade)

    elif opcao == "4":
        id = int(input("ID: "))
        deletar_pessoa(id)

    elif opcao == "0":
        print("Saindo...")
        break

    else:
        print("Opção Inválida!")
# Importa o Flask para criar uma API
from flask import Flask, request, jsonify

# Importar o módulo JSON
import json

# Cria a aplicação Flask
app = Flask(__name__)

# Chama o arquivo contato.json
ARQUIVO = "contatos.json"

# Função ler os dados
def ler_dados():
    # Abre o arquivo somente como leitura
    with open(ARQUIVO, "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)

def salvar_dados(dados):
    # Recebe um dicionário Python e grava no arquivo JSON
    with open(ARQUIVO, "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, ensure_ascii=False, indent=2)

# Rota para listar contatos (GET)
@app.route("/contatos/<grupo>", methods=["GET"])

def listar_contatos(grupo):
    dados = ler_dados()
    # Verifica se o grupo existe
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado..."}), 404
    return jsonify(dados[grupo])

# Rota para adicionar um contato (POST)
@app.route("/contatos/<grupo>", methods=["POST"])

def adicionar_contatos(grupo):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado..."}), 404
    # Obtém o JSON enviado no corpo da requisição
    corpo = request.json

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Campos 'nome' e 'telefone' são obrigatórios..."}), 400
    
    novo_contato = {
        "nome": corpo["nome"],
        "telefone": corpo["telefone"]
    }

    dados[grupo].append(novo_contato)
    
    salvar_dados(dados)

    return jsonify ({
        "mensagem": "Contato Adicionado com Sucesso!",
        "contato": novo_contato
    }), 201

# Rota para atualizar o contato (PUT)
@app.route("/contatos/<grupo>/<int:index>", methods=["PUT"])

def atualizar_contato(grupo, index):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado..."}), 404
    
    # Verifica se o único índice existe
    if index < 0 or index >= len(dados[grupo]):
        return jsonify({"erro": "Contato não encontrado..."}), 404
    
    corpo = request.json

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Campos 'nome' e 'telefone' são obrigatórios..."}), 400
    
    # Atualiza o contato
    dados[grupo][index] = {"nome": corpo["nome"], "telefone": corpo["telefone"]}

    salvar_dados(dados)

    return jsonify ({
        "mensagem": "Contato Atualizado com Sucesso!", "contato": dados[grupo][index]
    }), 200

# Deletar contato
@app.route("/contatos/<grupo>/<int:index>", methods=["DELETE"])

def excluir_contatos(grupo,index):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado..."}), 404
    
    if index < 0 or index >= len(dados[grupo]):
        return jsonify({"erro": "Contatos não encontrados..."}), 404
    
    contato_removido = dados[grupo].pop(index)

    salvar_dados(dados)

    return jsonify ({
        "mensagem": "Contato Excluído com Sucesso!",
        "contato": contato_removido
    })

# Inicia o servidor 
if __name__ == "__main__":
    print("API Rodando Em: http://localhost:3000/contatos")
    app.run(host="127.0.0.1", port=3000)
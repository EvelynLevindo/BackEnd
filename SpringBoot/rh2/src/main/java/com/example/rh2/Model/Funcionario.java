package com.example.rh2.Model;

import java.io.Serializable;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

// Classe de conexão com o Bnco de Dado
// Anotação de Entidade
@Entity
public class Funcionario implements Serializable{
    // Permite transformar os dados em binário, podendo ser lido pelo Banco de Dados
    
    private static final long serialVersionUID = 1L;

    // Criação das colunas do bando (atributo da classe)
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id;
    private String nome;
    private String email;

    // Source Action para  gerar os Gets and Setter
    public static long getSerialversionuid() {
        return serialVersionUID;
    }
    public long getId() {
        return id;
    }
    public void setId(long id) {
        this.id = id;
    }
    public String getNome() {
        return nome;
    }
    public void setNome(String nome) {
        this.nome = nome;
    }
    public String getEmail() {
        return email;
    }
    public void setEmail(String email) {
        this.email = email;
    }
}

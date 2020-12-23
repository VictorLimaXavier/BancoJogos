from dao.connectionFactory import MySql
from model.jogo import Jogo


class JogoDao:

    __connection = None

    def criar(jogo):
        try:
            __connection = MySql.Connect()
            querry = f"INSERT INTO jogos VALUES (0, '{jogo.getNome()}', '{jogo.getGenero()}', {jogo.getAno()}, " \
                     f"{int(jogo.getTenho())}, {int(jogo.getFavorito())})"
            cursor = __connection.cursor()
            cursor.execute(querry)
            jogo.setId(cursor.lastrowid)
            __connection.commit()
            print('Jogo cadastrado!')
        except Exception as e:
            print(e)
            __connection.rollback()
        __connection.close()

    def carregar(id):
        try:
            __connection = MySql.Connect()
            querry = f'SELECT * FROM jogos WHERE id = {id}'
            cursor = __connection.cursor()
            cursor.execute(querry)
            tp_jogo = cursor.fetchone()
            if tp_jogo is not None:
                jogo = Jogo(tp_jogo[1], tp_jogo[2], tp_jogo[3])
                jogo.setId(tp_jogo[0])
                jogo.setTenho(tp_jogo[4])
                jogo.setFavorito(tp_jogo[5])
                return jogo
            else:
                print('Jogo não encontrado!')
        except Exception as e:
            print(e)
            __connection.rollback()
        __connection.close()

    @staticmethod
    def carregarTodos():
        try:
            __connection = MySql.Connect()
            querry = 'SELECT * FROM jogos'
            cursor = __connection.cursor()
            cursor.execute(querry)
            tp_jogos = cursor.fetchall()
            jogos = []
            for tp_jogo in tp_jogos:
                jogo = Jogo(tp_jogo[1], tp_jogo[2], tp_jogo[3])
                jogo.setId(tp_jogo[0])
                jogo.setTenho(tp_jogo[4])
                jogo.setFavorito(tp_jogo[5])
                jogos.append(jogo)
            return jogos
        except Exception as e:
            print(e)
            __connection.rollback()
        __connection.close()


    def atualizar(jogo):
        try:
            __connection = MySql.Connect()
            querry = f"UPDATE jogos SET nome = '{jogo.getNome()}', genero = '{jogo.getGenero()}', ano = {jogo.getAno()}, " \
                     f"tenho = {int(jogo.getTenho())}, favorito = {int(jogo.getFavorito())} WHERE id = {jogo.getId()}"
            cursor = __connection.cursor()
            cursor.execute(f'Select nome FROM jogos WHERE id = {jogo.getId()}')
            if cursor.fetchone() is not None:
                cursor.execute(querry)
                __connection.commit()
                print('Jogo atualizado!')
            else:
                print('Jogo não encontrado!')
        except Exception as e:
            print(e)
            __connection.rollback()
        __connection.close()

    def deletar(id):
        try:
            __connection = MySql.Connect()
            querry = f"DELETE FROM jogos WHERE id = {id}"
            cursor = __connection.cursor()
            cursor.execute(f'Select nome FROM jogos WHERE id = {id}')
            if cursor.fetchone() is not None:
                cursor.execute(querry)
                __connection.commit()
                print('Jogo deletado!')
            else:
                print('Jogo não encontrado!')
        except Exception as e:
            print(e)
            __connection.rollback()
        __connection.close()

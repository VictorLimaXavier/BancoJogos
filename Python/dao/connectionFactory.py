import mysql.connector as m


class MySql:
    mensagem = ''
    try:
        @staticmethod
        def Connect():
            connection = m.connect(
                host='localhost',
                user='root',
                password='Vlx25233890.',
                database='game'
            )
            if connection.is_connected():
                MySql.mensagem = 'Conectado'
                return connection
    except Exception as e:
        MySql.mensagem = e

    @staticmethod
    def Close(self, connection):
        connection.close()
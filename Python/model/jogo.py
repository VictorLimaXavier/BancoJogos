class Jogo:

    __id = int
    __nome = str
    __genero = str
    __ano = int
    __tenho = False
    __favorito = False

    def __init__(self, nome, genero, ano):
        self.__nome = nome
        self.__genero = genero
        self.__ano = ano

    def setId(self, id):
        self.__id = id

    def setNome(self, nome):
        self.__nome = nome

    def setGenero(self, genero):
        self.__genero = genero

    def setAno(self, ano):
        self.__ano = ano

    def setTenho(self, tenho):
        self.__tenho = tenho

    def setFavorito(self, favorito):
        self.__favorito = favorito

    def getId(self):
        return self.__id

    def getNome(self):
        return self.__nome

    def getGenero(self):
        return self.__genero

    def getAno(self):
        return self.__ano

    def getTenho(self):
        return self.__tenho

    def getFavorito(self):
        return self.__favorito

    def __str__(self):
        return f'{self.__id}. Nome = {self.__nome}, Gênero = {self.__genero}, Ano = {self.__ano}, Tenho = {"Sim" if self.__tenho else "Não"}, ' \
               f'Favorito = {"Sim" if self.__favorito else "Não"}'

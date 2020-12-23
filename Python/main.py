from dao.jogoDao import JogoDao
from model.jogo import Jogo
from time import sleep


def novo():

    # Definindo nome, gênero e ano do jogo
    while True:
        try:
            j1 = Jogo(str(input('Digite o nome do jogo: ')), str(input('Digite o gênero: ')),
                      int(input('Digite a data de lançamento: ')))
            break
        except:
            print('Digite valores válido!')

    # Definindo se tenho
    try:
        tem = str(input('Tem? Sim ou Não?(opcional) '))
    except ValueError:
        tem = None
    while True:
        if tem == '':
            break
        elif tem[0].upper() in 'SN':
            break
        else:
            tem = str(input('Digite um valor válido!\n'))
    if tem != '' and tem[0].upper() == 'S':
        j1.setTenho(True)

    # Definindo se é favorito
    try:
        fav = str(input('É um favorito? Sim ou Não?(opcional) '))
    except ValueError:
        fav = None
    while True:
        if fav == '':
            break
        elif fav[0].upper() in 'SN':
            break
        else:
            fav = str(input('Digite um valor válido!\n'))
    if fav != '' and fav[0].upper() == 'S':
        j1.setTenho(True)

    return j1


while True:

    # Tratamento de erro para escolher uma opção
    try:
        print('Opções sobre sua lista jogos:')
        sleep(0.4)
        print('1.Criar\n2.Carregar todos\n3.Carregar jogo\n4.Atualizar\n5.Deletar\n6.Sair')
        sleep(0.4)
        opcao = int(input('Escolha uma opção: '))
        print()
    except ValueError:
        opcao = -1

    # Quando digita a opção 1 (Criar)
    if opcao == 1:
        j1 = novo()
        JogoDao.criar(j1)

    # Quando digita a opção 2 (Carregar todos)
    elif opcao == 2:
        jogos = JogoDao.carregarTodos()
        for j in jogos:
            print(f'{j.getId()}. {j.getNome()}')

    # Quando digita a opção 3 (Carregar jogo)
    elif opcao == 3:
        while True:
            try:
                id = int(input('Digite o id do jogo: '))
                break
            except ValueError:
                print('Digite um valor válido!')
        print()
        jogo = JogoDao.carregar(id)
        if jogo is not None:
            print(jogo)

    # Quando digita a opção 4 (Atualizar)
    elif opcao == 4:
        while True:
            try:
                id = int(input('Digite o id do jogo: '))
                break
            except ValueError:
                print('Digite um valor válido!')
        print()
        jogo = JogoDao.carregar(id)
        if jogo is not None:
            j1 = novo()
            j1.setId(jogo.getId())
            JogoDao.atualizar(j1)

    # Quando digita a opção 5 (Deletar)
    elif opcao == 5:
        while True:
            try:
                id = int(input('Digite o id do jogo: '))
                break
            except ValueError:
                print('Digite um valor válido!')
        print()
        JogoDao.deletar(id)

    # Quando digita a opção 6 (Sair)
    elif opcao == 6:
        break

    # Quando não é digitado um valor válido
    else:
        print('Digite um valor válido!')

    print()
    sleep(0.5)

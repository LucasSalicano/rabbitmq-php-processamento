# Exemplo simples do funcionamento de fila com RabbitMQ e PHP

Inciando o container do RabbitMQ 🐳
```
docker-compose up -d
```

Iniciando o receive que ficará resposavél por mostrar as mensagem que foram enviadas para fila:

```
php receive.php
```

Enviando mensagem para a fila:

```
php send.php
```

# Desafio

## Descrição
- Criar endopoint de salvamento da seguinte playload 

```json
{
    "dsEstrategia": "RETIRA",
    "nrPrioridade": 10,
    "horarios":[
        {
            "dsHorarioInicio": "09:00",
            "dsHorarioFinal": "10:00",
            "nrPrioridade": 40
        },
        {
            "dsHorarioInicio": "10:01",
            "dsHorarioFinal": "11:00",
            "nrPrioridade": 30
        },
        {
            "dsHorarioInicio": "11:01",
            "dsHorarioFinal": "12:00",
            "nrPrioridade": 20
        }
    ]
}
```
- Retornar os dados de consulta apartir da rota <code>GET /estrategiaWMS/{cdEstrategia}/{dsHora}/{dsMinuto}/prioridade</code>
```json
{
    "nr_prioridade": 30
}
```
## Pasta doc
Segue o arquivo json para import da collection. A collection foi importada do insominia mais pode ser carregada no postman sem perdas.

## Pré-requisito
- PHP
- Composer
- Postgresql

## Suporte
- Disponivel docker-compose.yml (possivel rodar tambem com **sail up -d**)
- DevContainer

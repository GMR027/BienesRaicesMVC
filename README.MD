# Deployment de Bienes Raices

### Paso 1: crear un k8s namespace llamado "edgar"

```sh
kubectl create namespace edgar
```

### Paso 2: construit la imagen de Docker

```sh
docker build -t bienes-raices-crud . && \
docker tag bienes-raices-crud christopherguzman/bienes-raices-crud:latest && \
docker push christopherguzman/bienes-raices-crud:latest
```

### Paso 3: deployar base de datos MySQL

```sh
helm -n edgar install my-sql deployment/my-sql
```

Eliminar MySQL deployment:

```sh
helm -n edgar delete my-sql
```

Para accesar a la base de datos:

```sh
mysql -u root -p bienes-raices-crud
```

### Paso 4: deployar la pagina de php

```sh
helm -n edgar install bienes-raices-crud deployment
```

Eliminar deployment:

```sh
helm -n edgar delete bienes-raices-crud
```

### Eliminar y desplegar en 1 solo comando

```sh
docker build -t bienes-raices-crud . && \
docker tag bienes-raices-crud christopherguzman/bienes-raices-crud:latest && \
docker push christopherguzman/bienes-raices-crud:latest && \
helm -n edgar delete bienes-raices-crud && \
helm -n edgar install bienes-raices-crud deployment
```

#### Tabla inicial de la base de datos

```sql
CREATE TABLE propiedades (
  id INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(100) NULL,
  imagen VARCHAR(100) NULL,
  precio VARCHAR(100) NULL,
  descripcion VARCHAR(100) NULL,
  habitaciones VARCHAR(100) NULL,
  wc VARCHAR(100) NULL,
  estacionamiento VARCHAR(100) NULL,
  Vendedores_id VARCHAR(100) NULL,
  creado VARCHAR(100) NULL
);
```

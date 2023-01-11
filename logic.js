
const data = {nombre: 'valor'};

fetch('index.php', {
  method: 'POST',
  body: JSON.stringify(data),
  headers: {
    'Content-Type': 'application/json'
  }
})
.then(response => response.text())
.then(data => {
    // manejar la respuesta del servidor
})
.catch(error => console.error(error));


let url = "http://localhost/newmobile/api/resgatar.php";
let clickado = false
function clicar(){
    if(!clickado){
        main();
        clickado = true
    }
}
function refresh(){
    window.location.reload()
}
function main(){
    document.getElementById("btnentrar").addEventListener("click", function(e){e.preventDefault()})
    carregaDados()
}
const carregaDados= ()=>{
    fetch(url).then(response=>{
        return (response.json())
    })
    .then(data=>{
        criarCampos(data)
    }), function (rejectionReason) { // 3
        console.log('Error parsing JSON from response:', rejectionReason, responseClone); // 4
        responseClone.text() // 5
        .then(function (bodyText) {
            console.log('Received the following instead of valid JSON:', bodyText); // 6
        });
    };
}
function criarCampos(data){
    let table = document.createElement('table');
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');

    table.appendChild(thead)
    table.appendChild(tbody)
    table.classList.add("table")
    
    document.getElementById('tabelaJs').appendChild(table)
    let row_1 = document.createElement('tr');
    let heading_1 = document.createElement('th');
    heading_1.innerHTML = "#";
    let heading_2 = document.createElement('th');
    heading_2.innerHTML = "Nome";
    let heading_3 = document.createElement('th');
    heading_3.innerHTML = "E-mail";
    let heading_4 = document.createElement('th');
    heading_4.innerHTML = "CPF";
    let heading_5 = document.createElement('th');
    heading_5.innerHTML = "Telefone";
    let heading_6 = document.createElement('th');
    heading_6.innerHTML = "Endereço";

    row_1.appendChild(heading_1);
    row_1.appendChild(heading_2);
    row_1.appendChild(heading_3);
    row_1.appendChild(heading_4);
    row_1.appendChild(heading_5);
    row_1.appendChild(heading_6);
    thead.appendChild(row_1);

    let i = 0
    while(i < data.length){

        let row_3 = document.createElement('tr');
        let row_3_data_1 = document.createElement('td');
        row_3_data_1.innerHTML = data[i][0];
        let row_3_data_2 = document.createElement('td');
        row_3_data_2.innerHTML = data[i].Nome;
        let row_3_data_3 = document.createElement('td');
        row_3_data_3.innerHTML = data[i].Email;
        let row_3_data_4 = document.createElement('td');
        row_3_data_4.innerHTML = data[i].Cpf;
        let row_3_data_5 = document.createElement('td');
        row_3_data_5.innerHTML = data[i].Cell;
        let row_3_data_6 = document.createElement('td');
        row_3_data_6.innerHTML = data[i].Endereco;

        row_3.appendChild(row_3_data_1);
        row_3.appendChild(row_3_data_2);
        row_3.appendChild(row_3_data_3);
        row_3.appendChild(row_3_data_4);
        row_3.appendChild(row_3_data_5);
        row_3.appendChild(row_3_data_6);
        tbody.appendChild(row_3);
        i++;
    }
}
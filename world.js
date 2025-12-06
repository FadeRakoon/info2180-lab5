
document.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.getElementById("lookup");
    const searchCity = document.getElementById("city");
    const searchBar = document.getElementById("country");
    const result = document.getElementById("result");

    searchButton.addEventListener("click", ()=>{
        const country = searchBar.value;

        fetch("world.php?country=" + encodeURIComponent(country) + "&lookup=country")
            .then(response => response.text())
            .then(data =>{
                result.innerHTML = data;
            })
            .catch(error => {
                console.error('Error: ', error);
            });
    });

    searchCity.addEventListener("click", ()=>{
        const country = searchBar.value;

        fetch("world.php?country=" + encodeURIComponent(country) + "&lookup=cities")
            .then(response => response.text())
            .then(data =>{
                result.innerHTML = data;
            })
            .catch(error => {
                console.error('Error: ', error);
            });
    });
});
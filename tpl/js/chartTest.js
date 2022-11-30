
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
    labels: ['Basico 1 y 2', 'Basico 3 y 4', 'Basico 5 Intermedio 1', 'Intermedio 2 y 3', 'Intermedio 4 y 5'],
    datasets: [{
    label: 'Alumnos',
    data: datos,
    borderWidth: 1
}]
},
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
});


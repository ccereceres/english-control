
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
    labels: ['Basico 1 y 2', 'Basico 3 y 4', 'Basico 5 Intermedio 1', 'Intermedio 1 y 2', 'Intermedio 3 y 4'],
    datasets: [{
    label: 'Alumnos',
    data: [120, 190, 30, 50, 20],
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


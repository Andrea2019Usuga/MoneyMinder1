document.addEventListener("DOMContentLoaded", function() {
    const tips = [
        "Consejo 1: Crear un presupuesto mensual es una de las mejores formas de mantener tus finanzas bajo control. Comienza por listar todos tus ingresos y gastos, y asigna un límite de gasto para cada categoría. Asegúrate de incluir un apartado para el ahorro, idealmente al menos el 10% de tus ingresos. Revisar y ajustar tu presupuesto regularmente te ayudará a identificar áreas donde puedes reducir gastos y aumentar tu ahorro.",
        "Consejo 2: Reduce Gastos en Comestibles.Planifica tus comidas con anticipación y haz una lista de compras antes de ir al supermercado. Evita comprar por impulso y opta por productos de marca propia que suelen ser más económicos. Comprar a granel y aprovechar las ofertas y cupones también puede generar un ahorro significativo. Además, cocinar en casa en lugar de comer fuera puede reducir considerablemente tus gastos en alimentación.",
        "Consejo 3: Minimiza el Uso de Tarjetas de Crédito.Las tarjetas de crédito pueden ser útiles, pero también pueden llevar a gastos innecesarios y deudas. Intenta usar efectivo para tus compras diarias para ser más consciente de cuánto estás gastando. Si usas una tarjeta de crédito, paga el saldo completo cada mes para evitar cargos por intereses. Considera tener solo una tarjeta de crédito para emergencias y reducir la tentación de gastar más de lo necesario.",
        "Consejo 4: Aprovecha los Programas de Fidelidad y Descuentos.Muchos comercios y servicios ofrecen programas de fidelidad que recompensan tus compras con descuentos, puntos o recompensas. Inscríbete en estos programas y utilízalos cada vez que compres. Además, busca descuentos y promociones antes de hacer una compra significativa. Utilizar aplicaciones de comparación de precios puede ayudarte a encontrar las mejores ofertas y ahorrar una cantidad considerable de dinero a largo plazo."
    ];


    const tipImages = document.querySelectorAll('.tips-container img');


    tipImages.forEach((img, index) => {
        img.style.cursor = 'pointer';


        img.addEventListener('click', function() {
            let existingTip = img.parentElement.querySelector('.tip-message');
            if (existingTip) {
                existingTip.remove();
            } else {
                let tipMessage = document.createElement('div');
                tipMessage.className = 'tip-message';
                tipMessage.textContent = tips[index];
                img.parentElement.style.position = 'relative';
                img.parentElement.appendChild(tipMessage);


                setTimeout(() => {
                    tipMessage.remove();
                }, 5000);
            }
        });
    });
});

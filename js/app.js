document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.getElementById('menu-toggle');
  const sidebar = document.getElementById('sidebar-menu');
  const overlay = document.querySelector('.menu-overlay');
  const closeSidebar = document.getElementById('close-sidebar');

  menuToggle.addEventListener('click', function () {
    sidebar.classList.add('open');
    overlay.classList.add('active');
  });

  closeSidebar.addEventListener('click', function () {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
  });

  overlay.addEventListener('click', function () {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
  });

  document.querySelectorAll('.sidebar-nav').forEach(function(nav) {
    nav.addEventListener('click', function(e) {
      if (e.target.classList.contains('menu-label')) {
        const li = e.target.parentElement;
        if (li.classList.contains('menu-category')) {
          li.classList.toggle('open');
        }
      }
    });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const search = document.getElementById('search');

  // Crear contenedor para sugerencias
  let suggestionBox = document.createElement('div');
  suggestionBox.className = 'autocomplete-suggestions';
  suggestionBox.style.position = 'absolute';
  suggestionBox.style.background = '#fff';
  suggestionBox.style.border = '1px solid #ccc';
  suggestionBox.style.zIndex = '1000';
  suggestionBox.style.display = 'none';
  search.parentNode.appendChild(suggestionBox);

  // Algoritmo de búsqueda binaria para autocompletar
  function autocompletar(lista, query) {
    let resultados = [];
    let inicio = 0;
    let fin = lista.length - 1;
    query = query.toLowerCase();

    while (inicio <= fin) {
      let medio = Math.floor((inicio + fin) / 2);
      let nombre = lista[medio].toLowerCase();
      if (nombre.startsWith(query)) {
        // Buscar hacia atrás para el primer match
        let i = medio;
        while (i >= 0 && lista[i].toLowerCase().startsWith(query)) i--;
        i++;
        // Agregar todos los matches consecutivos
        while (i < lista.length && lista[i].toLowerCase().startsWith(query)) {
          resultados.push(lista[i]);
          i++;
        }
        break;
      } else if (nombre < query) {
        inicio = medio + 1;
      } else {
        fin = medio - 1;
      }
    }
    return resultados;
  }

  search.addEventListener('input', function () {
    const query = search.value.trim();
    suggestionBox.innerHTML = '';
    if (query.length === 0) {
      suggestionBox.style.display = 'none';
      return;
    }
    const resultados = autocompletar(platosLista, query);
    if (resultados.length > 0) {
      resultados.forEach(item => {
        const div = document.createElement('div');
        div.textContent = item;
        div.className = 'suggestion-item';
        div.style.padding = '5px 10px';
        div.style.cursor = 'pointer';
        div.addEventListener('mousedown', function () {
          search.value = item;
          suggestionBox.style.display = 'none';
        });
        suggestionBox.appendChild(div);
      });
      // Posicionar debajo del input
      const rect = search.getBoundingClientRect();
      suggestionBox.style.left = rect.left + 'px';
      suggestionBox.style.top = (rect.bottom + window.scrollY) + 'px';
      suggestionBox.style.width = rect.width + 'px';
      suggestionBox.style.display = 'block';
    } else {
      suggestionBox.style.display = 'none';
    }
  });

  // Ocultar sugerencias al hacer clic fuera
  document.addEventListener('click', function (e) {
    if (!suggestionBox.contains(e.target) && e.target !== search) {
      suggestionBox.style.display = 'none';
    }
  });
});
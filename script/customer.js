   // Default data (kept in JS so UI can be dynamic)
    const state = {
      totalLocations: 369,
      payingLocations: 25,
      freemiumLocations: 254,
      payingCities: 3,
      freemiumCities: 8,
      retention: 0.90,
      arrPerLocation: 299,
      totalRevenueYear1: 28000
    };

    function fmt(n){return Number(n).toLocaleString()}

    function refreshUI(){
      document.getElementById('totalLocations').textContent = fmt(state.totalLocations);
      document.getElementById('payingLocations').textContent = fmt(state.payingLocations);
      document.getElementById('freemiumLocations').textContent = fmt(state.freemiumLocations);
      document.getElementById('payingCities').textContent = fmt(state.payingCities);
      document.getElementById('freemiumCities').textContent = fmt(state.freemiumCities);
      document.getElementById('retentionPct').textContent = Math.round(state.retention*100) + '%';

      document.getElementById('arrPerLocation').textContent = fmt(state.arrPerLocation);
      document.getElementById('arrPerCity').textContent = fmt(4485);
      document.getElementById('totalRevenue').textContent = fmt(state.totalRevenueYear1);

      document.getElementById('retLabel').textContent = Math.round(state.retention*100) + '%';
      document.getElementById('tblPaying').textContent = fmt(state.payingLocations);
      document.getElementById('tblARR').textContent = fmt(state.arrPerLocation);
      document.getElementById('tblRetention').textContent = Math.round(state.retention*100) + '%';

      const projected = Math.round(state.payingLocations * state.arrPerLocation * state.retention);
      document.getElementById('tblProjected').textContent = fmt(projected);

      // side panel
      document.getElementById('sideTotal').textContent = fmt(state.totalLocations);
      document.getElementById('sideCities').textContent = fmt(state.payingCities);
    }

    function updateRetention(v){ state.retention = Number(v)/100; refreshUI(); }
    function updatePayingLocs(v){ state.payingLocations = Number(v)||0; refreshUI(); }
    function updateARR(v){ state.arrPerLocation = Number(v)||0; refreshUI(); }

    function applyQuickScenario(add){ state.payingLocations += add; document.getElementById('payingLocInput').value = state.payingLocations; refreshUI(); }
    function resetDefaults(){ state.totalLocations=369; state.payingLocations=25; state.freemiumLocations=254; state.payingCities=3; state.freemiumCities=8; state.retention=0.90; state.arrPerLocation=299; document.getElementById('retention').value = 90; document.getElementById('arrInput').value=299; document.getElementById('payingLocInput').value=25; refreshUI(); }

    // download the currently-rendered HTML for quick sharing
    function downloadHTML(){
      const html = '<!doctype html>\n' + document.documentElement.outerHTML;
      const blob = new Blob([html], {type: 'text/html'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a'); a.href = url; a.download = 'ablevu_customers_revenue.html'; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
    }


    // initial render
    refreshUI();



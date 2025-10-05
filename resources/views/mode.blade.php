{{-- resources/views/layouts/cliente.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dashboard • Armagedon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Armagedon Dashboard">
    <meta name="keywords" content="Armagedon, Dashboard, Admin">
    <meta name="author" content="Armagedon">
    <link rel="icon" href="{{ url('assets/images/logoAKL-512.png') }}" type="image/png">

    {{-- Fuentes y estilos base del theme --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
          id="main-font-link">
    <link rel="stylesheet" href="{{ url('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ url('assets/css/style-preset.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    {{-- ====== Armagedon Dark Layer (override) ====== --}}
    <style>
        :root{
            --arm-bg:#0B1220; --arm-bg-2:#0F172A; --arm-card:#111827; --arm-border:#1F2937;
            --arm-text:#E5E7EB; --arm-text-2:#94A3B8; --arm-accent:#FF6A3D; --arm-accent-soft:#3b251f;
            --arm-chip:#1E293B; --arm-hover:#0E1627; --arm-shadow:0 8px 20px rgba(0,0,0,.35);
        }
        html[data-theme="dark"] body{ background:var(--arm-bg); color:var(--arm-text); }
        body{ background:var(--arm-bg); color:var(--arm-text); font-family:'Public Sans',system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; }

        .brand-arm .arm-logo{ width:38px;height:38px;border-radius:10px;object-fit:cover;background:#0b0b0b;border:1px solid var(--arm-border);box-shadow:0 6px 14px rgba(255,106,61,.25); }

        .pc-sidebar,.navbar-wrapper,.m-header{ background:var(--arm-bg-2)!important;border-right:1px solid var(--arm-border); }
        .pc-navbar .pc-item .pc-link,.pc-navbar .pc-caption .pc-mtext{ color:var(--arm-text)!important; }
        .pc-navbar .pc-item .pc-link:hover,.pc-navbar .pc-item .pc-link:focus{ background:var(--arm-hover); }
        .pc-header,.header-wrapper{ background:var(--arm-bg-2)!important;border-bottom:1px solid var(--arm-border);color:var(--arm-text); }
        .pc-head-link,.header-search .form-control{ color:var(--arm-text);background:transparent; }
        .header-search .form-control::placeholder{ color:var(--arm-text-2); }
        .dropdown-menu{ background:var(--arm-card);border:1px solid var(--arm-border);box-shadow:var(--arm-shadow);color:var(--arm-text); }
        .dropdown-item{ color:var(--arm-text); } .dropdown-item:hover{ background:var(--arm-hover);color:var(--arm-text); }

        .pc-container{ background:var(--arm-bg); }
        .pc-content{ color:var(--arm-text); padding-bottom:20px; }

        .card{ background:var(--arm-card)!important;border:1px solid var(--arm-border)!important;box-shadow:var(--arm-shadow)!important;color:var(--arm-text); border-radius:14px; }
        .chip{ background:var(--arm-chip);color:var(--arm-text);border:1px solid var(--arm-border);padding:6px 10px;border-radius:999px;font-size:12px;font-weight:700; }
        .soft{ background:var(--arm-accent-soft);color:var(--arm-accent);border:1px solid var(--arm-border); }

        /* ---- MODE view layout ---- */
        .mode-toolbar{
            display:flex;gap:12px;flex-wrap:wrap;align-items:center;justify-content:space-between;margin:6px 0 14px;
        }
        .mode-left{display:flex;gap:8px;flex-wrap:wrap;align-items:center;}
        .mode-right{display:flex;gap:8px;align-items:center;}
        .btn{
            border:1px solid #334155;background:#1f2937;color:#e5e7eb;padding:8px 12px;border-radius:10px;font-weight:700;cursor:pointer;
        }
        .btn:hover{ background:#374151; }
        .select{
            background:#0F172A;color:var(--arm-text);border:1px solid var(--arm-border);border-radius:10px;padding:8px 10px;font-weight:700;
        }

        .kpi-grid{
            display:grid;gap:12px;grid-template-columns:repeat(12,1fr);margin:8px 0 14px;
        }
        .kpi{
            grid-column:span 3 / span 3; padding:14px; display:flex;align-items:center;gap:12px;border-radius:12px;
        }
        .kpi .ico{width:42px;height:42px;display:grid;place-items:center;border-radius:10px;}
        .kpi small{display:block;color:var(--arm-text-2);font-weight:700;margin-bottom:2px;}
        .kpi b{font-size:20px;font-weight:900;color:var(--arm-text);}
        @media(max-width:1024px){ .kpi{grid-column:span 6 / span 6;} }
        @media(max-width:640px){ .kpi{grid-column:span 12 / span 12;} }

        .charts-grid{
            display:grid;gap:14px;grid-template-columns:repeat(12,1fr);
        }
        .cg-6{ grid-column:span 6 / span 6; padding:14px; }
        .cg-12{ grid-column:span 12 / span 12; padding:14px; }
        @media(max-width:1024px){ .cg-6{grid-column:span 12 / span 12;} }

        .card h3{margin:0 0 10px;font-size:16px;font-weight:800;}
        .legend{font-size:12px;color:var(--arm-text-2);}

        table{width:100%;border-collapse:separate;border-spacing:0 8px;}
        th,td{padding:10px 12px;text-align:left;}
        thead th{color:var(--arm-text-2);font-weight:800;border-bottom:1px solid var(--arm-border);}
        tbody tr{background:#0f172a;border:1px solid var(--arm-border);}
        tbody tr td:first-child{border-top-left-radius:10px;border-bottom-left-radius:10px;}
        tbody tr td:last-child{border-top-right-radius:10px;border-bottom-right-radius:10px;}
    </style>

    @stack('styles')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="dark">
<div class="loader-bg">
    <div class="loader-track"><div class="loader-fill"></div></div>
</div>

<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header" style="padding:12px;">
            <a href="{{ url('#') }}" class="b-brand brand-arm">
                <img src="{{ url('assets/images/logo_armagedon.jpeg') }}" alt="Armagedon" class="arm-logo"/>
                <span class="arm-text"><span class="title">Armagedon</span></span>
            </a>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <span class="pc-mtext" style="font-weight:800; font-size:15px;">Dashboard</span>
                </li>
                <li class="pc-item">
                    <a href="{{ url('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-cube"></i></span>
                        <span class="pc-mtext">Simulación 3D</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('kpi') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-planet"></i></span>
                        <span class="pc-mtext">Nasa API Feed</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('mode') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-school"></i></span>
                        <span class="pc-mtext">Educational / Gamified Mode</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('comments') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-message-circle"></i></span>
                        <span class="pc-mtext">Comments</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('settings') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-settings"></i></span>
                        <span class="pc-mtext">Settings</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('logout') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-logout"></i></span>
                        <span class="pc-mtext">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="pc-header">
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
                </li>
                <li class="dropdown pc-h-item d-inline-flex d-md-none">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#">
                        <i class="ti ti-search"></i>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <i data-feather="search"></i>
                                <input type="search" class="form-control border-0 shadow-none" placeholder="Buscar…">
                            </div>
                        </form>
                    </div>
                </li>
                <li class="pc-h-item d-none d-md-inline-flex">
                    <form class="header-search">
                        <i data-feather="search" class="icon-search"></i>
                        <input type="search" class="form-control" placeholder="Buscar…">
                    </form>
                </li>
            </ul>
        </div>

        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="pc-h-item">
                    <button id="themeToggle" class="pc-head-link bg-transparent border-0" title="Cambiar tema" aria-label="Cambiar tema">
                        <i class="ti ti-moon" id="themeIcon"></i>
                    </button>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#">
                        <i class="ti ti-mail"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" data-bs-auto-close="outside">
                        <i class="ti ti-user" style="font-size:18px; margin-right:6px;"></i>
                        <span><b>Usuario</b></span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <div class="d-flex mb-1 align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="user-avtar wid-35 d-flex align-items-center justify-content-center rounded-circle"
                                         style="background:#0f172a;border:1px solid var(--arm-border);">
                                        <i class="ti ti-user" style="font-size:20px; color:var(--arm-text-2);"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3"><h6 class="mb-1">Usuario</h6></div>
                                <form method="POST" action="" class="ms-auto">
                                    @csrf
                                    <button type="submit" class="pc-head-link bg-transparent border-0 p-0" title="Salir">
                                        <i class="ti ti-power" style="color:#ef4444;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist"></ul>
                        <div class="tab-content" id="mysrpTabContent">
                            <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel">
                                <a href="#!" class="dropdown-item"><i class="ti ti-edit-circle"></i><span>Editar perfil</span></a>
                                <a href="#!" class="dropdown-item"><i class="ti ti-user"></i><span>Ver perfil</span></a>
                                <a href="#!" class="dropdown-item"><i class="ti ti-clipboard-list"></i><span>Datos personales</span></a>
                                <a href="#!" class="dropdown-item"><i class="ti ti-wallet"></i><span>Facturación</span></a>
                            </div>
                            <div class="tab-pane fade" id="drp-tab-2" role="tabpanel">
                                <a href="#!" class="dropdown-item"><i class="ti ti-help"></i><span>Soporte</span></a>
                                <a href="#!" class="dropdown-item"><i class="ti ti-lock"></i><span>Centro de privacidad</span></a>
                                <a href="#!" class="dropdown-item"><i class="ti ti-messages"></i><span>Comentarios</span></a>
                                <a href="#!" class="dropdown-item"><i class="ti ti-list"></i><span>Historial</span></a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

@php
    // Fuente (si luego decides mostrar algo 3D aquí)
    $src = request('src');
    if (!$src) {
        $file = trim(request('file', 'modelo.glb'), '/');
        $src = url('storage/models/' . $file);
    }
@endphp

{{-- ======================= CONTENIDO ======================= --}}
<div class="pc-container">
    <div class="pc-content">

        {{-- Toolbar --}}
        <div class="mode-toolbar">
            <div class="mode-left">
                <span class="chip soft"><i class="ti ti-school" style="margin-right:6px;"></i> Educational / Gamified Mode</span>
                <span class="chip"><i class="ti ti-rocket" style="margin-right:6px;"></i> Simulación offline</span>
            </div>
            <div class="mode-right">
                <select id="scenario" class="select" title="Escenario">
                    <option value="caracas">Impacto terrestre — Caracas</option>
                    <option value="pacifico" selected>Impacto oceánico — Pacífico (Lima/Callao)</option>
                    <option value="flyby">Sobrevuelo 2029 — Deflexión preventiva</option>
                </select>
                <button id="regen" class="btn"><i class="ti ti-refresh"></i> Regenerar predicción</button>
            </div>
        </div>

        {{-- KPIs --}}
        <div class="kpi-grid">
            <div class="kpi card">
                <div class="ico soft"><i class="ti ti-flame"></i></div>
                <div><small>Energía estimada (MT TNT)</small><b id="kpiEnergy">—</b></div>
            </div>
            <div class="kpi card">
                <div class="ico soft"><i class="ti ti-arrows-minimize"></i></div>
                <div><small>Δv sugerido (m/s)</small><b id="kpiDv">—</b></div>
            </div>
            <div class="kpi card">
                <div class="ico soft"><i class="ti ti-clock-hour-4"></i></div>
                <div><small>Tiempo de aviso (meses)</small><b id="kpiTaw">—</b></div>
            </div>
            <div class="kpi card">
                <div class="ico soft"><i class="ti ti-shield-check"></i></div>
                <div><small>Confianza del modelo (%)</small><b id="kpiConf">—</b></div>
            </div>
        </div>

        {{-- Grids de gráficos --}}
        <div class="charts-grid">
            <div class="card cg-6">
                <h3>Riesgo relativo a 24 meses</h3>
                <div class="legend">Escala arbitraria (educativa). Más alto = mayor exposición esperada.</div>
                <canvas id="chartRisk" height="150"></canvas>
            </div>

            <div class="card cg-6">
                <h3>Energía comparada</h3>
                <div class="legend">Apophis vs eventos/artefactos (educativo).</div>
                <canvas id="chartEnergyBars" height="150"></canvas>
            </div>

            <div class="card cg-6">
                <h3>Probabilidad por categoría</h3>
                <div class="legend">Distribución ficticia: deflexión, fragmentación, tsunami.</div>
                <canvas id="chartProb" height="180"></canvas>
            </div>

            <div class="card cg-6">
                <h3>Confianza por submodelos</h3>
                <div class="legend">Trayectoria, densidad, porosidad, acoplamiento, batimetría.</div>
                <canvas id="chartRadar" height="180"></canvas>
            </div>

            <div class="card cg-12">
                <h3>Recomendaciones de acción</h3>
                <div class="legend">Sugerencias de alto nivel para el escenario seleccionado.</div>
                <div style="overflow-x:auto;margin-top:8px;">
                    <table>
                        <thead>
                        <tr>
                            <th>Escenario</th>
                            <th>Estrategia</th>
                            <th>Objetivo</th>
                            <th>Ventana recomendada</th>
                            <th>Notas</th>
                        </tr>
                        </thead>
                        <tbody id="recTable">
                        {{-- filas dinámicas --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- JS base --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ url('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ url('assets/js/pages/dashboard-default.js') }}"></script>
<script src="{{ url('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/simplebar.min.js') }}"></script>
script src="{{ url('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ url('assets/js/pcoded.js') }}"></script>
<script src="{{ url('assets/js/plugins/feather.min.js') }}"></script>

<script>
    // Tema
    layout_change('dark'); change_box_container('false'); layout_rtl_change('false');
    preset_change("preset-1"); font_change("Public-Sans");
    (function(){
        const root=document.documentElement, btn=document.getElementById('themeToggle'), icon=document.getElementById('themeIcon');
        const saved=localStorage.getItem('arm-theme');
        function apply(theme){
            root.setAttribute('data-theme', theme);
            try{ layout_change(theme); }catch(e){}
            icon.classList.remove('ti-sun','ti-moon'); icon.classList.add(theme==='dark'?'ti-moon':'ti-sun');
            localStorage.setItem('arm-theme', theme);
        }
        apply(saved==='light'?'light':'dark');
        btn?.addEventListener('click',()=>{ const c=root.getAttribute('data-theme')||'dark'; apply(c==='dark'?'light':'dark'); });
    })();
</script>

<script>
    // === Datos FICTICIOS + Render ===
    const $ = (id)=>document.getElementById(id);

    // Utilidades
    const rnd = (min,max)=> Math.random()*(max-min)+min;
    const nfi = (n,d=1)=> Number(n).toLocaleString('es-PE',{minimumFractionDigits:d,maximumFractionDigits:d});
    const clamp=(v,a,b)=>Math.max(a,Math.min(b,v));

    // Estado
    let charts = { risk:null, bars:null, prob:null, radar:null };

    const labelsMonths = Array.from({length:24}, (_,i)=>{
        const d=new Date(); d.setMonth(d.getMonth()+i);
        return d.toLocaleDateString('es-PE',{month:'short'});
    });

    function fakeKpis(scenario){
        if (scenario==='caracas'){
            return { energy: rnd(1500,2800), dv: rnd(0.15,0.45), taw: rnd(3,8), conf: rnd(70,90) };
        } else if (scenario==='pacifico'){
            return { energy: rnd(1000,2400), dv: rnd(0.10,0.35), taw: rnd(4,12), conf: rnd(72,92) };
        }
        // flyby
        return { energy: rnd(800,1600), dv: rnd(0.05,0.20), taw: rnd(18,36), conf: rnd(80,96) };
    }

    function fakeRiskSeries(scenario){
        const base = scenario==='flyby' ? 18 : 8;
        let s=[], val=rnd(20,40);
        for(let i=0;i<24;i++){
            val += rnd(-6,6);
            val = clamp(val, 5, scenario==='flyby'?45:85);
            if (i===base) val += scenario==='flyby' ? -10 : +20; // evento
            s.push(Math.round(val));
        }
        return s;
    }

    function fakeEnergyBars(energyMT){
        return {
            labels:['Apophis (sim)','Tunguska (~5 MT)','Tsar Bomba (50 MT)','Chelyabinsk (~0.5 MT)'],
            data:[Math.round(energyMT), 5, 50, 0.5]
        };
    }

    function fakeProbBreakdown(scenario){
        if (scenario==='pacifico') return [55,10,35]; // deflexión / fragmentación / tsunami
        if (scenario==='caracas') return [50,35,15];
        return [80,5,15];
    }

    function fakeRadar(){
        return [
            Math.round(rnd(70,95)), // Trayectoria
            Math.round(rnd(60,90)), // Densidad
            Math.round(rnd(55,85)), // Porosidad
            Math.round(rnd(50,80)), // Acoplamiento
            Math.round(rnd(65,92))  // Batimetría / Geología
        ];
    }

    function drawCharts(scenario){
        const { energy, dv, taw, conf } = fakeKpis(scenario);
        $('kpiEnergy').textContent = nfi(energy,1);
        $('kpiDv').textContent     = nfi(dv*1000,0); // m/s => mostramos en m/s (si quieres cm/s cambia)
        $('kpiTaw').textContent    = nfi(taw,0);
        $('kpiConf').textContent   = nfi(conf,0);

        // RISK (line)
        charts.risk && charts.risk.destroy();
        charts.risk = new Chart($('chartRisk'), {
            type:'line',
            data:{
                labels:labelsMonths,
                datasets:[{
                    label:'Riesgo relativo',
                    data: fakeRiskSeries(scenario),
                    fill:false,
                    tension:0.25
                }]
            },
            options:{
                plugins:{ legend:{ labels:{ color:'#E5E7EB' } } },
                scales:{
                    x:{ ticks:{ color:'#E5E7EB' } },
                    y:{ ticks:{ color:'#E5E7EB' }, beginAtZero:true, suggestedMax:100 }
                }
            }
        });

        // ENERGY (bars)
        const eb = fakeEnergyBars(energy);
        charts.bars && charts.bars.destroy();
        charts.bars = new Chart($('chartEnergyBars'), {
            type:'bar',
            data:{ labels:eb.labels, datasets:[{ label:'MT TNT', data:eb.data }] },
            options:{
                plugins:{ legend:{ labels:{ color:'#E5E7EB' } }, tooltip:{ callbacks:{
                    label:(ctx)=>` ${nfi(ctx.raw,1)} MT TNT`
                }}},
                scales:{
                    x:{ ticks:{ color:'#E5E7EB' } },
                    y:{ ticks:{ color:'#E5E7EB' }, beginAtZero:true }
                }
            }
        });

        // PROB (doughnut)
        const pb = fakeProbBreakdown(scenario);
        charts.prob && charts.prob.destroy();
        charts.prob = new Chart($('chartProb'), {
            type:'doughnut',
            data:{ labels:['Deflexión','Fragmentación','Tsunami'], datasets:[{ data:pb }] },
            options:{ plugins:{ legend:{ labels:{ color:'#E5E7EB' } } } }
        });

        // RADAR (confidence per submodel)
        const rd = fakeRadar();
        charts.radar && charts.radar.destroy();
        charts.radar = new Chart($('chartRadar'), {
            type:'radar',
            data:{
                labels:['Trayectoria','Densidad','Porosidad','Acoplamiento','Batim./Geol.'],
                datasets:[{ label:'Confianza (%)', data:rd }]
            },
            options:{
                plugins:{ legend:{ labels:{ color:'#E5E7EB' } } },
                scales:{
                    r:{
                        angleLines:{ color:'#334155' }, grid:{ color:'#334155' },
                        pointLabels:{ color:'#E5E7EB' }, ticks:{ display:false }, suggestedMin:0, suggestedMax:100
                    }
                }
            }
        });

        // Recomendaciones por escenario (tabla)
        const rows = {
            caracas: [
                ['Impacto terrestre — Caracas','Deflexión nuclear stand-off','Δv ≥ 0.2 m/s','6–12 meses','Riesgo de fragmentación: coordinar escolta de fragmentos'],
                ['Impacto terrestre — Caracas','Impactador cinético múltiple','Δv ≥ 0.1 m/s','≥ 12 meses','Requiere ventana de lanzamiento y guiado de precisión']
            ],
            pacifico: [
                ['Impacto oceánico — Pacífico','Deflexión temprana','Δv ≥ 0.15 m/s','6–18 meses','Reduce altura de ola potencial en costa lejana'],
                ['Impacto oceánico — Pacífico','Protección civil costera','Evac. vertical + cell broadcast','D-3 a H-2','Puntos críticos: La Punta, Costa Verde baja, aeropuerto']
            ],
            flyby: [
                ['Sobrevuelo 2029','Monitoreo + tractor gravitatorio','Δv milimétrico','18–36 meses','Estrategia fina sin fragmentación'],
                ['Sobrevuelo 2029','Impactador cinético (contingencia)','Δv ≥ 0.05 m/s','≥ 24 meses','Solo si la órbita refinada lo recomendara']
            ]
        }[scenario];

        const tbody = $('recTable');
        tbody.innerHTML = rows.map(r=>`<tr>${r.map(c=>`<td>${c}</td>`).join('')}</tr>`).join('');
    }

    // Eventos
    $('regen').addEventListener('click', ()=> drawCharts($('scenario').value));
    $('scenario').addEventListener('change', (e)=> drawCharts(e.target.value));

    // Primer render
    drawCharts('pacifico');
</script>

@stack('scripts')
</body>
</html>

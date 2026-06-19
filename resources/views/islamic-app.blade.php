<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>ليالي - التطبيق الإسلامي</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
:root {
    --green: #2d6a4f; --green-light: #40916c; --green-pale: #d8f3dc;
    --gold: #b7791f; --gold-light: #f6e05e;
    --bg: #0d1b12; --bg2: #122318; --bg3: #1a3326;
    --card: #1e3d2f; --text: #f0fdf4; --text2: #86efac; --text3: #4ade80;
    --border: #2d6a4f44; --radius: 16px;
}
body { font-family: 'Segoe UI', Tahoma, Arial, sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; overflow-x: hidden; }

/* SCREENS */
.screen { display: none; min-height: 100vh; flex-direction: column; }
.screenx { display: none; height: 100vh; flex-direction: column; overflow: hidden; }
.screen.active { display: flex; }

/* SPLASH */
#splash { background: linear-gradient(160deg,#0d1b12,#1a3326,#0d1b12); align-items:center; justify-content:center; gap:20px; }
.splash-moon { font-size:80px; animation: pulse 2s ease-in-out infinite; }
.splash-title { font-size:42px; font-weight:700; color:var(--gold-light); letter-spacing:4px; }
.splash-sub { color:var(--text2); font-size:16px; }
.splash-bar { width:50px; height:4px; background:var(--bg3); border-radius:2px; overflow:hidden; margin-top:20px; }
.splash-fill { height:100%; background:linear-gradient(90deg,var(--green-light),var(--gold-light)); animation:load 2s ease-out forwards; }
@keyframes load { from{width:0} to{width:100%} }
@keyframes pulse { 0%,100%{transform:scale(1)} 50%{transform:scale(1.05)} }
@keyframes spin { to{transform:rotate(360deg)} }

/* HEADER */
.header { background:linear-gradient(135deg,var(--bg2),var(--bg3)); padding:50px 20px 24px; border-bottom:1px solid var(--border); }
.header-top { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
.header-date { color:var(--text2); font-size:13px; }
.page-header { background:var(--bg2); padding:50px 16px 16px; border-bottom:1px solid var(--border); display:flex; align-items:center; gap:12px; }
.back-btn { width:36px; height:36px; background:var(--card); border:1px solid var(--border); border-radius:10px; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:18px; flex-shrink:0; }
.page-title { font-size:20px; font-weight:700; }

/* PRAYER WIDGET */
.prayer-widget { margin:16px; background:linear-gradient(135deg,var(--green),#1b4332); border-radius:var(--radius); padding:18px; border:1px solid #40916c33; position:relative; overflow:hidden; cursor:pointer; }
.prayer-widget::before { content:'🌙'; position:absolute; right:-10px; top:-10px; font-size:80px; opacity:0.1; }
.pw-label { font-size:12px; color:var(--green-pale); opacity:.8; margin-bottom:4px; }
.pw-name { font-size:22px; font-weight:700; color:#fff; }
.pw-time { font-size:38px; font-weight:300; color:var(--gold-light); letter-spacing:2px; }
.pw-countdown { font-size:12px; color:var(--green-pale); margin-top:4px; }
.prayer-row { display:flex; gap:8px; margin-top:14px; }
.prayer-pill { flex:1; background:rgba(0,0,0,.2); border-radius:10px; padding:8px 4px; text-align:center; font-size:10px; color:var(--green-pale); }
.prayer-pill.cur { background:rgba(255,255,255,.15); color:#fff; font-weight:600; }
.prayer-pill span { display:block; font-size:12px; color:var(--gold-light); margin-top:2px; }

/* QUICK GRID */
.section-title { padding:16px 16px 8px; font-size:12px; color:var(--text2); font-weight:600; letter-spacing:1px; text-transform:uppercase; }
.quick-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:10px; padding:0 16px; }
.quick-item { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:14px 8px; text-align:center; cursor:pointer; transition:transform .15s; }
.quick-item:active { transform:scale(.95); }
.quick-icon { font-size:28px; margin-bottom:6px; }
.quick-label { font-size:11px; color:var(--text2); }

/* DAILY CARD */
.daily-card { margin:16px; background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:18px; cursor:pointer; }
.dc-label { font-size:11px; color:var(--text2); margin-bottom:10px; }
.dc-arabic { font-size:22px; color:var(--text); line-height:1.7; text-align:right; direction:rtl; margin-bottom:12px; }
.dc-trans { font-size:13px; color:var(--text2); line-height:1.5; border-top:1px solid var(--border); padding-top:10px; }
.dc-source { font-size:11px; color:var(--text3); margin-top:8px; }

/* SEARCH */
.search-bar { margin:12px 16px; display:flex; background:var(--card); border:1px solid var(--border); border-radius:12px; overflow:hidden; }
.search-bar input { flex:1; padding:12px 16px; background:none; border:none; outline:none; color:var(--text); font-size:14px; direction:rtl; text-align:right; }
.search-bar input::placeholder { color:var(--text2); opacity:.5; }
.search-bar button { padding:12px 16px; background:var(--green-light); border:none; color:#fff; cursor:pointer; font-size:16px; }

/* SURAH LIST */
.surah-list { overflow-y:auto; flex:1; padding-bottom:80px; }
.surah-item { display:flex; align-items:center; gap:14px; padding:14px 16px; border-bottom:1px solid var(--border); cursor:pointer; }
.surah-item:active { background:var(--card); }
.surah-num { width:38px; height:38px; background:var(--card); border:1px solid var(--border); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:13px; color:var(--text3); font-weight:600; flex-shrink:0; }
.surah-info { flex:1; }
.surah-name-en { font-size:16px; font-weight:600; }
.surah-meta { font-size:12px; color:var(--text2); margin-top:2px; }
.surah-arabic { font-size:20px; color:var(--gold-light); direction:rtl; }

/* AYAH */
.ayah-container { flex:1; overflow-y:auto; padding:16px; padding-bottom:80px; }
.bismillah { text-align:center; font-size:26px; color:var(--gold-light); padding:20px; margin-bottom:10px; }
.ayah-block { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:16px; margin-bottom:12px; }
.ayah-text { font-size:22px; line-height:2; direction:rtl; text-align:right; color:var(--text); margin-bottom:10px; }
.ayah-trans { font-size:13px; color:var(--text2); line-height:1.6; border-top:1px solid var(--border); padding-top:10px; }
.ayah-num { font-size:11px; color:var(--text3); margin-top:8px; }

/* PRAYER TIMES */
.loc-bar { display:flex; align-items:center; gap:8px; margin:12px 16px; background:var(--card); border:1px solid var(--border); border-radius:12px; padding:10px 14px; }
.loc-bar input { flex:1; background:none; border:none; outline:none; color:var(--text); font-size:14px; text-align:center; }
.loc-bar input::placeholder { color:var(--text2); opacity:.5; }
.loc-btn { background:var(--green-light); color:#fff; border:none; border-radius:8px; padding:8px 14px; font-size:13px; cursor:pointer; white-space:nowrap; }
.prayer-cards { padding:0 16px; display:flex; flex-direction:column; gap:10px; }
.p-card { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:16px 18px; display:flex; justify-content:space-between; align-items:center; }
.p-card.cur { border-color:var(--green-light); background:var(--bg3); }
.p-card-name { font-size:18px; font-weight:600; }
.p-card-time { font-size:22px; color:var(--gold-light); font-weight:300; }
.p-card.cur .p-card-time { color:var(--text3); }
.cur-badge { font-size:10px; color:var(--green-light); background:#2d6a4f33; padding:2px 8px; border-radius:20px; margin-top:4px; display:inline-block; }
.qibla-sec { margin:16px; background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:20px; text-align:center; }
.qibla-compass { font-size:60px; margin:12px auto; display:block; transition:transform 1s ease; }
.qibla-deg { font-size:32px; color:var(--gold-light); font-weight:300; }

/* HADITH */
.hadith-card { margin:0 16px 16px; background:linear-gradient(135deg,#1b4332,#2d6a4f); border-radius:var(--radius); padding:20px; border:1px solid #40916c44; }
.h-num { font-size:11px; color:var(--green-pale); margin-bottom:10px; }
.h-text { font-size:16px; line-height:1.8; direction:rtl; text-align:right; color:var(--text); margin-bottom:12px; }
.h-trans { font-size:13px; color:var(--green-pale); line-height:1.6; }
.h-source { font-size:11px; color:var(--gold-light); margin-top:10px; }
.refresh-btn { width:42px; height:42px; background:var(--card); border:1px solid var(--border); border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:20px; margin:0 auto 12px; }
.refresh-btn.spin { animation:spin .6s linear; }
.col-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:10px; padding:0 16px; }
.col-card { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:16px; cursor:pointer; }
.col-card:active { background:var(--bg3); }
.col-icon { font-size:24px; margin-bottom:8px; }
.col-name { font-size:14px; font-weight:600; }
.col-count { font-size:11px; color:var(--text2); margin-top:2px; }

/* DUA */
.cat-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:10px; }
.cat-card { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:16px; cursor:pointer; text-align:center; }
.cat-card:active { background:var(--bg3); }
.cat-icon { font-size:32px; margin-bottom:8px; }
.cat-name { font-size:13px; font-weight:600; }
.dua-item { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:16px; }
.dua-title { font-size:12px; color:var(--text3); font-weight:600; margin-bottom:10px; text-transform:uppercase; letter-spacing:.5px; }
.dua-arabic { font-size:20px; line-height:1.9; direction:rtl; text-align:right; color:var(--text); margin-bottom:10px; }
.dua-trans { font-size:13px; color:var(--text2); line-height:1.6; }
.dua-source { font-size:11px; color:var(--gold-light); margin-top:8px; }

/* NAMES */
.names-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:10px; padding:0 16px; overflow-y:auto; flex:1; padding-bottom:80px; }
.name-card { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:16px; text-align:center; }
.name-num { font-size:10px; color:var(--text3); margin-bottom:6px; }
.name-ar { font-size:22px; color:var(--gold-light); margin-bottom:6px; direction:rtl; }
.name-tr { font-size:12px; color:var(--text2); }
.name-en { font-size:11px; color:var(--text2); opacity:.7; margin-top:4px; }

/* CALENDAR */
.cal-hero { background:linear-gradient(135deg,var(--bg2),var(--bg3)); margin:16px; border-radius:var(--radius); padding:24px; text-align:center; border:1px solid var(--border); }
.cal-date { font-size:36px; font-weight:700; color:var(--gold-light); }
.cal-lbl { font-size:14px; color:var(--text2); margin-top:4px; }
.cal-greg { font-size:14px; color:var(--text2); margin-top:12px; }
.events-list { padding:0 16px; display:flex; flex-direction:column; gap:10px; }
.ev-item { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:14px 16px; display:flex; gap:14px; align-items:center; }
.ev-icon { font-size:28px; }
.ev-name { font-size:14px; font-weight:600; }
.ev-date { font-size:12px; color:var(--text2); margin-top:2px; }

/* LOADER */
.loader-c { flex:1; display:flex; align-items:center; justify-content:center; flex-direction:column; gap:12px; padding:40px; }
.spinner { width:34px; height:34px; border:3px solid var(--border); border-top-color:var(--green-light); border-radius:50%; animation:spin .8s linear infinite; }
.loader-t { color:var(--text2); font-size:13px; }

/* SCROLL */
.scroll-c { flex:1; overflow-y:auto; height:calc(100vh - 130px); }

/* BOTTOM NAV */
.bnav { position:fixed; bottom:0; left:0; right:0; background:var(--bg2); border-top:1px solid var(--border); display:flex; padding:8px 0 16px; z-index:100; }
.nv { flex:1; display:flex; flex-direction:column; align-items:center; gap:4px; cursor:pointer; padding:4px; }
.nv-icon { font-size:22px; }
.nv-lbl { font-size:10px; color:var(--text2); }
.nv.on .nv-lbl { color:var(--text3); }
.nv.on::after { content:''; display:block; width:4px; height:4px; background:var(--text3); border-radius:50%; margin-top:2px; }

/* TOAST */
.toast { position:fixed; top:60px; left:50%; transform:translateX(-50%); background:var(--green); color:#fff; padding:10px 20px; border-radius:20px; font-size:13px; z-index:999; opacity:0; transition:opacity .3s; pointer-events:none; white-space:nowrap; }
.toast.show { opacity:1; }
</style>
</head>
<body>

<!-- SPLASH -->
<div class="screen active" id="splash">
    <div class="splash-moon">☪️</div>
    <div class="splash-title">ليالي</div>
    <div class="splash-sub">تطبيقك الإسلامي الشامل</div>
    <div class="splash-bar"><div class="splash-fill"></div></div>
</div>

<div class="toast" id="toast"></div>

<!-- HOME -->
<div class="screen" id="home">
    <div class="header">
        <div class="header-top">
            <div class="header-date" id="home-date">جاري تحميل التاريخ...</div>
            <div style="font-size:22px">☪️</div>
        </div>
        <div style="font-size:13px;color:var(--text2);margin-bottom:2px">السلام عليكم</div>
        <div style="font-size:24px;font-weight:700">مرحباً بك في ليالي 🌿</div>
    </div>

    <div class="prayer-widget" onclick="showScreen('prayer')">
        <div class="pw-label">الصلاة القادمة</div>
        <div class="pw-name" id="pw-name">جاري التحميل...</div>
        <div class="pw-time" id="pw-time">--:--</div>
        <div class="pw-countdown" id="pw-cd">⏱ جاري الحساب...</div>
        <div class="prayer-row" id="pw-row"></div>
    </div>

    <div class="section-title">🕌 الخدمات</div>
    <div class="quick-grid">
        <div class="quick-item" onclick="showScreen('quran')"><div class="quick-icon">📖</div><div class="quick-label">القرآن</div></div>
        <div class="quick-item" onclick="showScreen('hadith')"><div class="quick-icon">📜</div><div class="quick-label">الحديث</div></div>
        <div class="quick-item" onclick="showScreen('dua')"><div class="quick-icon">🤲</div><div class="quick-label">الأدعية</div></div>
        <div class="quick-item" onclick="showScreen('names')"><div class="quick-icon">✨</div><div class="quick-label">أسماء الله</div></div>
        <div class="quick-item" onclick="showScreen('prayer')"><div class="quick-icon">🕌</div><div class="quick-label">مواقيت</div></div>
        <div class="quick-item" onclick="showScreen('calendar')"><div class="quick-icon">📅</div><div class="quick-label">التقويم</div></div>
        <div class="quick-item" onclick="showScreen('prayer')"><div class="quick-icon">🧭</div><div class="quick-label">القبلة</div></div>
        <div class="quick-item" onclick="goRandomDua()"><div class="quick-icon">🎲</div><div class="quick-label">دعاء</div></div>
    </div>

    <div class="section-title">📿 آية اليوم</div>
    <div class="daily-card" id="daily-ayah">
        <div class="dc-label">📖 جاري التحميل...</div>
        <div class="dc-arabic">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
        <div class="dc-trans">بسم الله الرحمن الرحيم</div>
    </div>
    <div style="height:80px"></div>
    <div class="bnav">
        <div class="nv on" onclick="showScreen('home')"><div class="nv-icon">🏠</div><div class="nv-lbl">الرئيسية</div></div>
        <div class="nv" onclick="showScreen('quran')"><div class="nv-icon">📖</div><div class="nv-lbl">القرآن</div></div>
        <div class="nv" onclick="showScreen('prayer')"><div class="nv-icon">🕌</div><div class="nv-lbl">الصلاة</div></div>
        <div class="nv" onclick="showScreen('dua')"><div class="nv-icon">🤲</div><div class="nv-lbl">الأدعية</div></div>
        <div class="nv" onclick="showScreen('hadith')"><div class="nv-icon">📜</div><div class="nv-lbl">الحديث</div></div>
    </div>
</div>

<!-- QURAN -->
<div class="screen" id="quran">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('home')">←</div>
        <div class="page-title">القرآن الكريم 📖</div>
    </div>
    <div class="search-bar">
        <input type="text" id="q-search" placeholder="ابحث في السور أو الآيات..." oninput="filterSurahs(this.value)">
        <button onclick="doSearch()">🔍</button>
    </div>
    <div class="surah-list" id="surah-list">
        <div class="loader-c"><div class="spinner"></div><div class="loader-t">جاري تحميل السور...</div></div>
    </div>
    <div class="bnav">
        <div class="nv" onclick="showScreen('home')"><div class="nv-icon">🏠</div><div class="nv-lbl">الرئيسية</div></div>
        <div class="nv on" onclick="showScreen('quran')"><div class="nv-icon">📖</div><div class="nv-lbl">القرآن</div></div>
        <div class="nv" onclick="showScreen('prayer')"><div class="nv-icon">🕌</div><div class="nv-lbl">الصلاة</div></div>
        <div class="nv" onclick="showScreen('dua')"><div class="nv-icon">🤲</div><div class="nv-lbl">الأدعية</div></div>
        <div class="nv" onclick="showScreen('hadith')"><div class="nv-icon">📜</div><div class="nv-lbl">الحديث</div></div>
    </div>
</div>

<!-- SURAH VIEW -->
<div class="screen" id="surah-view">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('quran')">←</div>
        <div class="page-title" id="sv-title">السورة</div>
    </div>
    <div class="ayah-container" id="ayah-c">
        <div class="loader-c"><div class="spinner"></div></div>
    </div>
</div>

<!-- PRAYER -->
<div class="screen" id="prayer">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('home')">←</div>
        <div class="page-title">مواقيت الصلاة 🕌</div>
    </div>
    <div class="loc-bar">
        <button class="loc-btn" onclick="getMyLocation()">📍 موقعي</button>
        <input type="number" id="lat-in" placeholder="خط العرض" step="any" value="30.0444" style="text-align:center;width:90px">
        <input type="number" id="lng-in" placeholder="خط الطول" step="any" value="31.2357" style="text-align:center;width:90px">
        <button class="loc-btn" onclick="loadPrayer()">بحث</button>
    </div>
    <div class="scroll-c" id="prayer-c">
        <div class="loader-c"><div class="spinner"></div><div class="loader-t">جاري التحميل...</div></div>
    </div>
    <div class="bnav">
        <div class="nv" onclick="showScreen('home')"><div class="nv-icon">🏠</div><div class="nv-lbl">الرئيسية</div></div>
        <div class="nv" onclick="showScreen('quran')"><div class="nv-icon">📖</div><div class="nv-lbl">القرآن</div></div>
        <div class="nv on" onclick="showScreen('prayer')"><div class="nv-icon">🕌</div><div class="nv-lbl">الصلاة</div></div>
        <div class="nv" onclick="showScreen('dua')"><div class="nv-icon">🤲</div><div class="nv-lbl">الأدعية</div></div>
        <div class="nv" onclick="showScreen('hadith')"><div class="nv-icon">📜</div><div class="nv-lbl">الحديث</div></div>
    </div>
</div>

<!-- HADITH -->
<div class="screen" id="hadith">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('home')">←</div>
        <div class="page-title">الحديث الشريف 📜</div>
    </div>
    <div class="scroll-c">
        <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 16px 4px">
            <div style="font-size:13px;color:var(--text2)">حديث عشوائي</div>
            <div class="refresh-btn" id="h-refresh" onclick="loadHadith()">🔄</div>
        </div>
        <div id="hadith-c"><div class="loader-c"><div class="spinner"></div></div></div>
        <div class="section-title">📚 المجموعات</div>
        <div class="col-grid">
    <div class="col-card" onclick="loadHadithCollection('bukhari','البخاري')">
        <div class="col-icon">📘</div>
        <div class="col-name">البخاري</div>
        <div class="col-count">7563 حديث</div>
    </div>

    <div class="col-card" onclick="loadHadithCollection('muslim','مسلم')">
        <div class="col-icon">📗</div>
        <div class="col-name">مسلم</div>
        <div class="col-count">3033 حديث</div>
    </div>

    <div class="col-card" onclick="loadHadithCollection('abudawud','أبو داود')">
        <div class="col-icon">📙</div>
        <div class="col-name">أبو داود</div>
        <div class="col-count">5274 حديث</div>
    </div>

    <div class="col-card" onclick="loadHadithCollection('tirmidhi','الترمذي')">
        <div class="col-icon">📕</div>
        <div class="col-name">الترمذي</div>
        <div class="col-count">3956 حديث</div>
    </div>

    <div class="col-card" onclick="loadHadithCollection('ibnmajah','ابن ماجه')">
        <div class="col-icon">📓</div>
        <div class="col-name">ابن ماجه</div>
        <div class="col-count">4341 حديث</div>
    </div>

    <div class="col-card" onclick="loadHadithCollection('nasai','النسائي')">
        <div class="col-icon">📔</div>
        <div class="col-name">النسائي</div>
        <div class="col-count">5761 حديث</div>
    </div>
</div>
        <div style="height:20px"></div>
    </div>
    <div class="bnav">
        <div class="nv" onclick="showScreen('home')"><div class="nv-icon">🏠</div><div class="nv-lbl">الرئيسية</div></div>
        <div class="nv" onclick="showScreen('quran')"><div class="nv-icon">📖</div><div class="nv-lbl">القرآن</div></div>
        <div class="nv" onclick="showScreen('prayer')"><div class="nv-icon">🕌</div><div class="nv-lbl">الصلاة</div></div>
        <div class="nv" onclick="showScreen('dua')"><div class="nv-icon">🤲</div><div class="nv-lbl">الأدعية</div></div>
        <div class="nv on" onclick="showScreen('hadith')"><div class="nv-icon">📜</div><div class="nv-lbl">الحديث</div></div>
    </div>
</div>

<!-- DUA CATEGORIES -->
<div class="screen" id="dua">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('home')">←</div>
        <div class="page-title">الأدعية 🤲</div>
    </div>
    <div class="scroll-c" style="padding:12px 16px">
        <div id="dua-cats-c"><div class="loader-c"><div class="spinner"></div><div class="loader-t">جاري التحميل...</div></div></div>
    </div>
    <div class="bnav">
        <div class="nv" onclick="showScreen('home')"><div class="nv-icon">🏠</div><div class="nv-lbl">الرئيسية</div></div>
        <div class="nv" onclick="showScreen('quran')"><div class="nv-icon">📖</div><div class="nv-lbl">القرآن</div></div>
        <div class="nv" onclick="showScreen('prayer')"><div class="nv-icon">🕌</div><div class="nv-lbl">الصلاة</div></div>
        <div class="nv on" onclick="showScreen('dua')"><div class="nv-icon">🤲</div><div class="nv-lbl">الأدعية</div></div>
        <div class="nv" onclick="showScreen('hadith')"><div class="nv-icon">📜</div><div class="nv-lbl">الحديث</div></div>
    </div>
</div>

<!-- DUA LIST -->
<div class="screen" id="dua-list">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('dua')">←</div>
        <div class="page-title" id="dua-list-title">الأدعية</div>
    </div>
    <div class="scroll-c" style="padding:12px 16px;display:flex;flex-direction:column;gap:12px" id="dua-items-c">
        <div class="loader-c"><div class="spinner"></div></div>
    </div>
</div>

<!-- 99 NAMES -->
<div class="screen" id="names">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('home')">←</div>
        <div class="page-title">أسماء الله الحسنى ✨</div>
    </div>
    <div class="names-grid" id="names-grid">
        <div class="loader-c" style="grid-column:span 2"><div class="spinner"></div><div class="loader-t">جاري التحميل...</div></div>
    </div>
</div>

<!-- CALENDAR -->
<div class="screen" id="calendar">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('home')">←</div>
        <div class="page-title">التقويم الإسلامي 📅</div>
    </div>
    <div class="scroll-c">
        <div class="cal-hero" id="cal-hero"><div class="spinner" style="margin:auto"></div></div>
        <div class="section-title">🌙 المناسبات الإسلامية</div>
        <div class="events-list" id="events-list"><div class="loader-c"><div class="spinner"></div></div></div>
        <div style="height:20px"></div>
    </div>
    <div class="bnav">
        <div class="nv" onclick="showScreen('home')"><div class="nv-icon">🏠</div><div class="nv-lbl">الرئيسية</div></div>
        <div class="nv" onclick="showScreen('quran')"><div class="nv-icon">📖</div><div class="nv-lbl">القرآن</div></div>
        <div class="nv" onclick="showScreen('prayer')"><div class="nv-icon">🕌</div><div class="nv-lbl">الصلاة</div></div>
        <div class="nv" onclick="showScreen('dua')"><div class="nv-icon">🤲</div><div class="nv-lbl">الأدعية</div></div>
        <div class="nv" onclick="showScreen('hadith')"><div class="nv-icon">📜</div><div class="nv-lbl">الحديث</div></div>
    </div>
</div>

<!-- HADITH COLLECTION -->
<!-- HADITH COLLECTION -->
<!-- HADITH COLLECTION -->
<div class="screen screenx" id="hadith-collection">
    <div class="page-header">
        <div class="back-btn" onclick="showScreen('hadith')">←</div>
        <div class="page-title" id="hadith-collection-title">الأحاديث</div>
    </div>
<div id="hadith-collection-content" style="flex:1; overflow-y:auto; min-height:0;">
        <div class="loader-c">
            <div class="spinner"></div>
            <div class="loader-t">جاري التحميل...</div>
        </div>
    </div>
</div>

<script>
const API = 'https://ummahapi.com';
let allSurahs = [];
let userLat = 30.0444, userLng = 31.2357; // Cairo default

// ─── NAVIGATION ───
function showScreen(id) {
    document.querySelectorAll('.screen').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.screenx').forEach(s => s.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    window.scrollTo(0, 0);
    if (id === 'quran'    && !allSurahs.length) loadSurahs();
    if (id === 'prayer')   loadPrayer();
    if (id === 'hadith')   loadHadith();
    if (id === 'dua')      loadDuaCats();
    if (id === 'names')    loadNames();
    if (id === 'calendar') loadCalendar();
}

function toast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2500);
}

// ─── SPLASH ───
setTimeout(() => {
    showScreen('home');
    loadHome();
}, 2200);

// ─── HOME ───
async function loadHome() {
    // Hijri date
    try {
        const r = await fetch(`${API}/api/hijri-date`);
        const d = await r.json();
        // Response: { date, hijri: {day, month, month_name, year}, gregorian:{...} }
        const h = d.hijri || d;
        document.getElementById('home-date').textContent =
            `${h.day || ''} ${h.month_name || ''} ${h.year || ''} هـ`;
    } catch(e) { document.getElementById('home-date').textContent = new Date().toLocaleDateString('ar-EG'); }

    // Random ayah
    try {
        const r = await fetch(`${API}/api/quran/random`);
        const d = await r.json();
        // top-level fields: text, translations, surah_name, ayah_number etc
        const a = d.data || d;
        document.getElementById('daily-ayah').innerHTML = `
            <div class="dc-label">📖 آية اليوم</div>
            <div class="dc-arabic">${a.text || a.arabic || ''}</div>
            <div class="dc-trans">${a.translations?.en?.text || a.translation || ''}</div>
            <div class="dc-source">سورة ${a.surah_name || ''} — آية ${a.ayah_number || a.number || ''}</div>`;
    } catch(e) {}

    // Prayer widget (Cairo)
    loadPrayerWidget(30.0444, 31.2357);
}

// async function loadPrayerWidget(lat, lng) {
//     try {
//         const r = await fetch(`${API}/api/prayer-times?lat=${lat}&lng=${lng}`);
//         const d = await r.json();
//         console.log(d)
//         const times = (d.data || d).times || (d.data || d).timings || d.times || {};
//         const prayers = [
//             { key:'fajr',    name:'الفجر'   },
//             { key:'dhuhr',   name:'الظهر'   },
//             { key:'asr',     name:'العصر'   },
//             { key:'maghrib', name:'المغرب'  },
//             { key:'isha',    name:'العشاء'  },
//         ];
//         const nowM = new Date().getHours()*60 + new Date().getMinutes();
//         const toMin = t => { if(!t) return 9999; const [h,m] = t.split(':').map(Number); return h*60+m; };
//         let nxt = prayers.find(p => toMin(times[p.key]) > nowM) || prayers[0];
//         document.getElementById('pw-name').textContent = nxt.name;
//         document.getElementById('pw-time').textContent = times[nxt.key] || '--:--';
//         const diff = toMin(times[nxt.key]) - nowM;
//         if (diff > 0 && diff < 9999) {
//             const h = Math.floor(diff/60), m = diff%60;
//             document.getElementById('pw-cd').textContent = `⏱ بعد ${h>0?h+' ساعة و':''}${m} دقيقة`;
//         }
//         document.getElementById('pw-row').innerHTML = prayers.map(p => `
//             <div class="prayer-pill ${p.key===nxt.key?'cur':''}">
//                 ${p.name}<span>${times[p.key]||'--'}</span>
//             </div>`).join('');
//     } catch(e) {}
// }

async function loadPrayerWidget(lat, lng) {
    try {
        const r = await fetch(`${API}/api/prayer-times?lat=${lat}&lng=${lng}`);
        const d = await r.json();

        console.log(d);

        const payload = d.data || d;
        const times = payload.prayer_times || {};

        const prayers = [
            { key: 'fajr', name: 'الفجر' },
            { key: 'dhuhr', name: 'الظهر' },
            { key: 'asr', name: 'العصر' },
            { key: 'maghrib', name: 'المغرب' },
            { key: 'isha', name: 'العشاء' }
        ];

        const now = new Date();
        const nowM = now.getHours() * 60 + now.getMinutes();

        const toMin = (t) => {
            if (!t) return 9999;
            const [h, m] = t.split(':').map(Number);
            return h * 60 + m;
        };

        let nxt =
            prayers.find(p => toMin(times[p.key]) > nowM) ||
            prayers[0];

        let diff = toMin(times[nxt.key]) - nowM;

        // بعد العشاء نحسب للفجر القادم
        if (diff < 0) {
            diff += 24 * 60;
        }

        document.getElementById('pw-name').textContent = nxt.name;
        document.getElementById('pw-time').textContent =
            times[nxt.key] || '--:--';

        if (diff > 0 && diff < 9999) {
            const h = Math.floor(diff / 60);
            const m = diff % 60;

            document.getElementById('pw-cd').textContent =
                `⏱ بعد ${h > 0 ? `${h} ساعة و ` : ''}${m} دقيقة`;
        } else {
            document.getElementById('pw-cd').textContent = '';
        }

        document.getElementById('pw-row').innerHTML = prayers.map(p => `
            <div class="prayer-pill ${p.key === nxt.key ? 'cur' : ''}">
                ${p.name}
                <span>${times[p.key] || '--:--'}</span>
            </div>
        `).join('');

    } catch (e) {
        console.error('Prayer Widget Error:', e);

        document.getElementById('pw-name').textContent = '--';
        document.getElementById('pw-time').textContent = '--:--';
        document.getElementById('pw-cd').textContent = '';
    }
}
// ─── QURAN ───
// async function loadSurahs() {
//     try {
//         const r = await fetch(`${API}/api/quran/surahs`);
//         const d = await r.json();
//         console.log(d)
//         allSurahs = d.surahs || d.data || d;
//         renderSurahs(allSurahs);
//     } catch(e) {
//         document.getElementById('surah-list').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">فشل التحميل</div>';
//     }
// }

async function loadSurahs() {
    try {
        const r = await fetch(`${API}/api/quran/surahs`);
        const d = await r.json();

        console.log(d);

        allSurahs =
            d?.data?.surahs ||
            d?.surahs ||
            [];

        renderSurahs(allSurahs);

    } catch (e) {
        console.error('Load Surahs Error:', e);

        document.getElementById('surah-list').innerHTML = `
            <div style="padding:20px;text-align:center;color:var(--text2)">
                فشل تحميل السور
            </div>
        `;
    }
}

function renderSurahs(list) {
    const rv = { Meccan:'مكية', Medinan:'مدنية' };
    document.getElementById('surah-list').innerHTML = list.map(s => `
        <div class="surah-item" onclick="loadSurah(${s.number},'${(s.name_arabic||s.name||'').replace(/'/g,"\\'")}')">
            <div class="surah-num">${s.number}</div>
            <div class="surah-info">
                <div class="surah-name-en">${s.englishName || s.name_english || s.name || ''}</div>
                <div class="surah-meta">${s.ayahCount || s.verses_count || s.numberOfAyahs || ''} آية · ${rv[s.revelationType||s.revelation_type]||''}</div>
            </div>
            <div class="surah-arabic">${s.name_arabic || s.name || ''}</div>
        </div>`).join('');
}

function filterSurahs(q) {
    if (!q) { renderSurahs(allSurahs); return; }
    renderSurahs(allSurahs.filter(s =>
        (s.name_arabic||'').includes(q) ||
        (s.englishName||s.name_english||s.name||'').toLowerCase().includes(q.toLowerCase()) ||
        String(s.number).includes(q)
    ));
}

async function doSearch() {
    const q = document.getElementById('q-search').value.trim();
    if (!q) return;
    document.getElementById('surah-list').innerHTML = `<div class="loader-c"><div class="spinner"></div><div class="loader-t">جاري البحث...</div></div>`;
    try {
        const r = await fetch(`${API}/api/quran/search?q=${encodeURIComponent(q)}`);
        const d = await r.json();
        const results = d.results || d.data || d;
        if (!Array.isArray(results) || !results.length) {
            document.getElementById('surah-list').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">لا توجد نتائج</div>';
            return;
        }
        document.getElementById('surah-list').innerHTML = results.map(a => `
            <div class="ayah-block" style="margin:8px 16px;cursor:pointer"
                 onclick="loadSurah(${a.surah_number||a.surah},'')">
                <div class="ayah-text">${a.text||a.arabic||''}</div>
                <div class="ayah-trans">${a.translations?.en?.text||a.translation||''}</div>
                <div class="ayah-num">📍 سورة ${a.surah_name||''} - آية ${a.ayah_number||a.number||''}</div>
            </div>`).join('');
    } catch(e) {}
}

async function loadSurah(num, name) {
    document.getElementById('sv-title').textContent = name || `سورة ${num}`;
    showScreen('surah-view');
    document.getElementById('ayah-c').innerHTML = `<div class="loader-c"><div class="spinner"></div><div class="loader-t">جاري تحميل الآيات...</div></div>`;
    try {
        const r = await fetch(`${API}/api/quran/surah/${num}`);
        const d = await r.json();
        const surah = d.data || d;
        const ayahs = surah.ayahs || surah.verses || surah.ayah || [];
        if (name && surah.name_arabic) document.getElementById('sv-title').textContent = surah.name_arabic || name;
        let html = (num !== 1 && num !== 9) ? `<div class="bismillah">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>` : '';
        html += ayahs.map((a, i) => `
            <div class="ayah-block">
                <div class="ayah-text">${a.text||a.arabic||''} ﴿${a.number_in_surah||a.numberInSurah||a.number||(i+1)}﴾</div>
                ${a.translations?.en?.text||a.translation?.text ? `<div class="ayah-trans">${a.translations?.en?.text||a.translation?.text||''}</div>` : ''}
                <div class="ayah-num">🔖 الآية ${a.number_in_surah||a.numberInSurah||a.number||(i+1)}</div>
            </div>`).join('');
        document.getElementById('ayah-c').innerHTML = html || '<div style="padding:20px;text-align:center;color:var(--text2)">لا توجد آيات</div>';
    } catch(e) {
        document.getElementById('ayah-c').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">فشل التحميل</div>';
    }
}

// ─── PRAYER ───
function getMyLocation() {
    toast('🔍 جاري تحديد موقعك...');
    navigator.geolocation.getCurrentPosition(pos => {
        document.getElementById('lat-in').value = pos.coords.latitude.toFixed(4);
        document.getElementById('lng-in').value = pos.coords.longitude.toFixed(4);
        loadPrayer();
    }, () => toast('❌ تعذر تحديد الموقع'));
}

// async function loadPrayer() {
//     const lat = parseFloat(document.getElementById('lat-in').value) || 30.0444;
//     const lng = parseFloat(document.getElementById('lng-in').value) || 31.2357;
//     userLat = lat; userLng = lng;
//     const c = document.getElementById('prayer-c');
//     c.innerHTML = `<div class="loader-c"><div class="spinner"></div><div class="loader-t">جاري التحميل...</div></div>`;
//     try {
//         const r = await fetch(`${API}/api/prayer-times?lat=${lat}&lng=${lng}&method=Egypt`);
//         const d = await r.json();
//         const payload = d.data || d;
//         const times = payload.times || payload.timings || {};
//         const prayers = [
//             { key:'fajr',    name:'الفجر',   icon:'🌙' },
//             { key:'sunrise', name:'الشروق',  icon:'🌅' },
//             { key:'dhuhr',   name:'الظهر',   icon:'☀️' },
//             { key:'asr',     name:'العصر',   icon:'🌤️' },
//             { key:'maghrib', name:'المغرب',  icon:'🌇' },
//             { key:'isha',    name:'العشاء',  icon:'🌃' },
//         ];
//         const toMin = t => { if(!t) return -1; const [h,m] = t.split(':').map(Number); return h*60+m; };
//         const nowM = new Date().getHours()*60 + new Date().getMinutes();
//         let curKey = null;
//         for (const p of prayers) { if (toMin(times[p.key]) <= nowM) curKey = p.key; }

//         c.innerHTML = `
//             <div class="prayer-cards">
//                 ${prayers.map(p => `
//                 <div class="p-card ${p.key===curKey?'cur':''}">
//                     <div>
//                         <div class="p-card-name">${p.icon} ${p.name}</div>
//                         ${p.key===curKey?'<span class="cur-badge">الوقت الحالي ✓</span>':''}
//                     </div>
//                     <div class="p-card-time">${times[p.key]||'--:--'}</div>
//                 </div>`).join('')}
//             </div>
//             <div class="qibla-sec" id="qibla-s">
//                 <div style="font-weight:600;margin-bottom:4px">🧭 اتجاه القبلة</div>
//                 <div class="spinner" style="margin:12px auto"></div>
//             </div>
//             <div style="height:20px"></div>`;
//         loadQibla(lat, lng);
//     } catch(e) {
//         c.innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">فشل التحميل. تحقق من القيم.</div>';
//     }
// }

async function loadPrayer() {
    const lat = parseFloat(document.getElementById('lat-in').value) || 30.0444;
    const lng = parseFloat(document.getElementById('lng-in').value) || 31.2357;

    userLat = lat;
    userLng = lng;

    const c = document.getElementById('prayer-c');

    c.innerHTML = `
        <div class="loader-c">
            <div class="spinner"></div>
            <div class="loader-t">جاري التحميل...</div>
        </div>
    `;

    try {
        const r = await fetch(
            `${API}/api/prayer-times?lat=${lat}&lng=${lng}&method=Egyptian`
        );

        const d = await r.json();

        console.log(d);

        const payload = d.data || d;

        const times = payload.prayer_times || {};
        const status = payload.current_status || {};

        const prayers = [
            { key: 'fajr',    name: 'الفجر',   icon: '🌙' },
            { key: 'sunrise', name: 'الشروق',  icon: '🌅' },
            { key: 'dhuhr',   name: 'الظهر',   icon: '☀️' },
            { key: 'asr',     name: 'العصر',   icon: '🌤️' },
            { key: 'maghrib', name: 'المغرب',  icon: '🌇' },
            { key: 'isha',    name: 'العشاء',  icon: '🌃' }
        ];

        const curKey = status.current_prayer || null;

        c.innerHTML = `
            <div class="prayer-cards">
                ${prayers.map(p => `
                    <div class="p-card ${p.key === curKey ? 'cur' : ''}">
                        <div>
                            <div class="p-card-name">
                                ${p.icon} ${p.name}
                            </div>

                            ${
                                p.key === curKey
                                    ? '<span class="cur-badge">الوقت الحالي ✓</span>'
                                    : ''
                            }
                        </div>

                        <div class="p-card-time">
                            ${times[p.key] || '--:--'}
                        </div>
                    </div>
                `).join('')}
            </div>

            <div class="qibla-sec" id="qibla-s">
                <div style="font-weight:600;margin-bottom:4px">
                    🧭 اتجاه القبلة
                </div>
                <div class="spinner" style="margin:12px auto"></div>
            </div>

            <div style="height:20px"></div>
        `;

        loadQibla(lat, lng);

    } catch (e) {
        console.error('Prayer Error:', e);

        c.innerHTML = `
            <div style="padding:20px;text-align:center;color:var(--text2)">
                فشل التحميل. تحقق من القيم.
            </div>
        `;
    }
}

async function loadQibla(lat, lng) {
    try {
        const r = await fetch(`${API}/api/qibla?lat=${lat}&lng=${lng}`);
        const d = await r.json();
        const payload = d.data || d;
        const dir = Math.round(payload.direction || payload.qibla || 0);
        const dist = payload.distance ? Math.round(payload.distance).toLocaleString() : '';
        document.getElementById('qibla-s').innerHTML = `
            <div style="font-weight:600;margin-bottom:4px">🧭 اتجاه القبلة</div>
            <div class="qibla-compass" style="transform:rotate(${dir}deg)">🧭</div>
            <div class="qibla-deg">${dir}°</div>
            ${dist ? `<div style="font-size:14px;color:var(--text2);margin-top:4px">المسافة: ${dist} كم</div>` : ''}`;
    } catch(e) {}
}

// ─── HADITH ───
async function loadHadith() {
    const btn = document.getElementById('h-refresh');
    if(btn) btn.classList.add('spin');
    setTimeout(() => { if(btn) btn.classList.remove('spin'); }, 700);
    try {
        const r = await fetch(`${API}/api/hadith/random`);
        const d = await r.json();
        const h = d.data || d;
        document.getElementById('hadith-c').innerHTML = `
            <div class="hadith-card">
                <div class="h-num">📚 ${h.collection||h.book||''} ${h.hadith_number||h.number?'• رقم '+(h.hadith_number||h.number):''}</div>
                <div class="h-text">${h.arabic||h.text||''}</div>
                ${h.english||h.translation ? `<div class="h-trans">${h.english||h.translation||''}</div>` : ''}
                ${h.chapter||h.grade ? `<div class="h-source">📌 ${h.chapter||''} ${h.grade?'| درجة: '+h.grade:''}</div>` : ''}
            </div>`;
    } catch(e) {
        document.getElementById('hadith-c').innerHTML = '<div style="padding:16px;text-align:center;color:var(--text2)">فشل التحميل</div>';
    }
}


let currentHadithCollection = '';
let currentHadithTitle = '';
let currentHadithPage = 1;
let isLoadingHadiths = false;
let hasMoreHadiths = true;

async function loadHadithCollection(collection, title) {

    currentHadithCollection = collection;
    currentHadithTitle = title;
    currentHadithPage = 1;
    hasMoreHadiths = true;

    document.getElementById('hadith-collection-title').textContent = title;

    showScreen('hadith-collection');

    const container =
        document.getElementById('hadith-collection-content');

    container.innerHTML = `
        <div class="loader-c">
            <div class="spinner"></div>
            <div class="loader-t">
                جاري تحميل الأحاديث...
            </div>
        </div>
    `;

    await loadMoreHadiths(true);
}

async function loadMoreHadiths(reset = false) {
    if (isLoadingHadiths || !hasMoreHadiths) return;
    isLoadingHadiths = true;

    const container = document.getElementById('hadith-collection-content');

    // أضف spinner في الأسفل لو مش reset
    let loadingEl = null;
    if (!reset) {
        loadingEl = document.createElement('div');
        loadingEl.className = 'loader-c';
        loadingEl.id = 'hadith-load-more';
        loadingEl.innerHTML = '<div class="spinner"></div>';
        container.appendChild(loadingEl);
    }

    try {
        const response = await fetch(
            `${API}/api/hadith/${currentHadithCollection}?page=${currentHadithPage}&limit=20`
        );
        const data = await response.json();

        let hadiths = [];
        if (Array.isArray(data.hadiths))            hadiths = data.hadiths;
        else if (Array.isArray(data.data?.hadiths)) hadiths = data.data.hadiths;
        else if (Array.isArray(data.data))          hadiths = data.data;

        // أزل spinner
        if (loadingEl) loadingEl.remove();

        if (!hadiths.length) {
            hasMoreHadiths = false;
            if (currentHadithPage === 1) {
                container.innerHTML = `<div style="text-align:center;padding:30px;color:var(--text2)">لا توجد أحاديث</div>`;
            } else {
                container.insertAdjacentHTML('beforeend', `
                    <div style="text-align:center;padding:20px;color:var(--text2);font-size:13px">
                        ✅ تم تحميل جميع الأحاديث
                    </div>`);
            }
            return;
        }

        const html = hadiths.map(h => {
            const text   = h.arabic || h.hadith || h.text || h.body || '';
            const number = h.hadith_number || h.number || '';
            const chapter = h.chapter || h.book || '';
            return `
                <div class="hadith-card">
                    <div class="h-num">📖 ${currentHadithTitle}${number ? ` • رقم ${number}` : ''}</div>
                    <div class="h-text">${text}</div>
                    ${chapter ? `<div class="h-source">${chapter}</div>` : ''}
                </div>`;
        }).join('');

        if (reset) {
            container.innerHTML = html;
        } else {
            container.insertAdjacentHTML('beforeend', html);
        }

        currentHadithPage++;

    } catch (error) {
        console.error(error);
        if (loadingEl) loadingEl.remove();
        if (currentHadithPage === 1) {
            container.innerHTML = `<div style="text-align:center;padding:30px;color:var(--text2)">فشل تحميل الأحاديث</div>`;
        }
    } finally {
        isLoadingHadiths = false;
    }
}

// ─── DUA ───
const DUA_ICONS = { morning:'🌅', evening:'🌆', sleep:'😴', waking:'🌄', food:'🍽️', travel:'✈️', mosque:'🕌', prayer:'🙏', quran:'📖', rain:'🌧️', distress:'💙', gratitude:'🙏', greeting:'👋', forgiveness:'🤍', family:'👨‍👩‍👧', home:'🏠', protection:'🛡️', health:'💚', default:'🤲' };

// async function loadDuaCats() {
//     try {
//         const r = await fetch(`${API}/api/duas/categories`);
//         const d = await r.json();
//         console.log(d)
//         const cats = d.data || d.categories || d;
//         if(!Array.isArray(cats)||!cats.length) throw new Error();
//         document.getElementById('dua-cats-c').innerHTML = `
//             <div class="cat-grid">
//                 ${cats.map(c => {
//                     const slug = (c.slug||c.id||c.name||'').toString().toLowerCase();
//                     const icon = Object.entries(DUA_ICONS).find(([k]) => slug.includes(k))?.[1] || DUA_ICONS.default;
//                     return `<div class="cat-card" onclick="loadDuaList('${c.slug||c.id||slug}','${(c.name||c.title||slug).replace(/'/g,"\\'")}')">
//                         <div class="cat-icon">${icon}</div>
//                         <div class="cat-name">${c.name||c.title||slug}</div>
//                     </div>`;
//                 }).join('')}
//             </div>`;
//     } catch(e) {
//         // Fallback: load all duas directly
//         try {
//             const r = await fetch(`${API}/api/duas`);
//             const d = await r.json();
//             const duas = d.data || d.duas || d;
//             // Group by category
//             const cats = [...new Set(duas.map(x => x.category||x.cat||'عام'))];
//             document.getElementById('dua-cats-c').innerHTML = `
//                 <div class="cat-grid">
//                     ${cats.map(c => {
//                         const slug = c.toLowerCase();
//                         const icon = Object.entries(DUA_ICONS).find(([k]) => slug.includes(k))?.[1] || DUA_ICONS.default;
//                         return `<div class="cat-card" onclick="loadDuaListFiltered('${c.replace(/'/g,"\\'")}')">
//                             <div class="cat-icon">${icon}</div>
//                             <div class="cat-name">${c}</div>
//                         </div>`;
//                     }).join('')}
//                 </div>`;
//             window._allDuas = duas;
//         } catch(e2) {
//             document.getElementById('dua-cats-c').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">فشل التحميل</div>';
//         }
//     }
// }

async function loadDuaCats() {
    try {
        const r = await fetch(`${API}/api/duas/categories`);
        const d = await r.json();

        console.log(d);

        const cats =
            d?.data?.categories ||
            d?.categories ||
            [];

        if (!Array.isArray(cats) || !cats.length) {
            throw new Error('No categories found');
        }

        document.getElementById('dua-cats-c').innerHTML = `
            <div class="cat-grid">
                ${cats.map(c => {
                    const slug = (c.id || c.slug || c.name || '')
                        .toString()
                        .toLowerCase();

                    const icon =
                        Object.entries(DUA_ICONS)
                            .find(([k]) => slug.includes(k))?.[1]
                        || DUA_ICONS.default;

                    return `
                        <div class="cat-card"
                             onclick="loadDuaList('${c.id || c.slug || slug}','${(c.name || slug).replace(/'/g,"\\'")}')">

                            <div class="cat-icon">${icon}</div>

                            <div class="cat-name">
                                ${c.name}
                            </div>

                            <small style="opacity:.7">
                                ${c.count || 0} دعاء
                            </small>
                        </div>
                    `;
                }).join('')}
            </div>
        `;

    } catch (e) {
        console.error(e);

        document.getElementById('dua-cats-c').innerHTML =
            '<div style="padding:20px;text-align:center;color:var(--text2)">فشل التحميل</div>';
    }
}

// async function loadDuaList(catId, catName) {
//     document.getElementById('dua-list-title').textContent = catName;
//     showScreen('dua-list');
//     document.getElementById('dua-items-c').innerHTML = `<div class="loader-c"><div class="spinner"></div></div>`;
//     try {
//         const r = await fetch(`${API}/api/duas/category/${catId}`);
//         const d = await r.json();
//         console.log(d)
//         renderDuas(d.data || d.duas || d);
//     } catch(e) {
//         document.getElementById('dua-items-c').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">فشل التحميل</div>';
//     }
// }

async function loadDuaList(catId, catName) {
    document.getElementById('dua-list-title').textContent = catName;

    showScreen('dua-list');

    document.getElementById('dua-items-c').innerHTML = `
        <div class="loader-c">
            <div class="spinner"></div>
        </div>
    `;

    try {
        const r = await fetch(`${API}/api/duas/category/${catId}`);
        const d = await r.json();

        console.log(d);

        const duas =
            d?.data?.duas ||
            d?.duas ||
            [];

        renderDuas(duas);

    } catch (e) {
        console.error('Load Dua List Error:', e);

        document.getElementById('dua-items-c').innerHTML = `
            <div style="padding:20px;text-align:center;color:var(--text2)">
                فشل التحميل
            </div>
        `;
    }
}

function loadDuaListFiltered(cat) {
    document.getElementById('dua-list-title').textContent = cat;
    showScreen('dua-list');
    const filtered = (window._allDuas||[]).filter(x => (x.category||x.cat||'') === cat);
    renderDuas(filtered);
}

function renderDuas(list) {
    if(!Array.isArray(list)||!list.length) {
        document.getElementById('dua-items-c').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">لا توجد أدعية</div>';
        return;
    }
    document.getElementById('dua-items-c').innerHTML = list.map(du => `
        <div class="dua-item">
            ${du.title||du.name ? `<div class="dua-title">${du.title||du.name}</div>` : ''}
            <div class="dua-arabic">${du.arabic||du.text||''}</div>
            ${du.translation||du.english ? `<div class="dua-trans">${du.translation||du.english}</div>` : ''}
            ${du.source||du.reference ? `<div class="dua-source">📌 ${du.source||du.reference}</div>` : ''}
        </div>`).join('');
}

async function goRandomDua() {
    toast('🤲 جاري تحميل دعاء...');
    try {
        const r = await fetch(`${API}/api/duas/random`);
        const d = await r.json();
        const du = d.data || d;
        document.getElementById('dua-list-title').textContent = du.title||du.category||'دعاء';
        showScreen('dua-list');
        renderDuas([du]);
    } catch(e) { toast('فشل التحميل'); }
}

// ─── 99 NAMES ───
async function loadNames() {
    try {
        const r = await fetch(`${API}/api/asma-ul-husna`);
        const d = await r.json();
        const names = d.data || d.names || d;
        document.getElementById('names-grid').innerHTML = names.map(n => `
            <div class="name-card">
                <div class="name-num">${n.number||n.id||''}</div>
                <div class="name-ar">${n.arabic||n.name||''}</div>
                <div class="name-tr">${n.transliteration||n.name_en||''}</div>
                <div class="name-en">${n.meaning||n.english||''}</div>
            </div>`).join('');
    } catch(e) {
        document.getElementById('names-grid').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2);grid-column:span 2">فشل التحميل</div>';
    }
}

// ─── CALENDAR ───
async function loadCalendar() {
    try {
        const r = await fetch(`${API}/api/hijri-date`);
        const d = await r.json();
        const h = d.hijri || d.data?.hijri || d;
        const g = d.gregorian || d.data?.gregorian || {};
        document.getElementById('cal-hero').innerHTML = `
            <div style="font-size:13px;color:var(--text2);margin-bottom:8px">التاريخ الهجري اليوم</div>
            <div class="cal-date">${h.day||''} ${h.month_name||''}</div>
            <div class="cal-lbl">${h.year||''} هجري</div>
            <div class="cal-greg">📅 ${g.date||new Date().toLocaleDateString('ar-EG')}</div>`;
    } catch(e) {
        document.getElementById('cal-hero').innerHTML = `<div class="cal-date">اليوم</div><div class="cal-lbl">${new Date().toLocaleDateString('ar-EG')}</div>`;
    }

    try {
        const r = await fetch(`${API}/api/hijri-date/events`);
        const d = await r.json();
        const evts = d.data || d.events || d;
        const icons = ['🌙','⭐','🕌','🎉','✨','📿','🌿','🌸'];
        document.getElementById('events-list').innerHTML = Array.isArray(evts) && evts.length
            ? evts.map((e,i) => `
                <div class="ev-item">
                    <div class="ev-icon">${icons[i%icons.length]}</div>
                    <div>
                        <div class="ev-name">${e.name||e.title||e.event||''}</div>
                        <div class="ev-date">${e.hijri_date||e.date||e.month||''}</div>
                    </div>
                </div>`).join('')
            : '<div style="padding:20px;text-align:center;color:var(--text2)">لا توجد مناسبات</div>';
    } catch(e) {
        document.getElementById('events-list').innerHTML = '<div style="padding:20px;text-align:center;color:var(--text2)">فشل تحميل المناسبات</div>';
    }
}

// ─── INFINITE SCROLL FOR HADITH COLLECTION ───
function setupHadithScroll() {
    const container = document.getElementById('hadith-collection-content');
    
    container.addEventListener('scroll', () => {
        const { scrollTop, clientHeight, scrollHeight } = container;
        if (scrollTop + clientHeight >= scrollHeight - 400) {
            loadMoreHadiths();
        }
    });
}

setupHadithScroll();
</script>


</body>
</html>
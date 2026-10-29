<?php

  $sql = $koneksi->query("SELECT COUNT(id_pend) as pend  from tb_pdd where status='Ada'");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['pend'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
  while ($data= $sql->fetch_assoc()) {
    $kartu=$data['kartu'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pend) as laki  from tb_pdd where jekel='LK'");
  while ($data= $sql->fetch_assoc()) {
    $laki=$data['laki'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pend) as prem  from tb_pdd where jekel='PR'");
  while ($data= $sql->fetch_assoc()) {
    $prem=$data['prem'];
  }

?>

<style>
/* Modern Dashboard Statistics Styling */
.dashboard-container {
    padding: 30px 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
    border-radius: 20px;
    margin-bottom: 30px;
}

.stats-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    margin-bottom: 30px;
    height: 200px;
}

.stats-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--card-gradient);
    transition: all 0.3s ease;
}

.stats-card:hover::before {
    height: 8px;
}

.stats-card.penduduk {
    --card-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.stats-card.keluarga {
    --card-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.stats-card.laki-laki {
    --card-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

.stats-card.perempuan {
    --card-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}

.card-inner {
    padding: 30px 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
}

.card-number {
    font-size: 3.5rem;
    font-weight: 700;
    background: var(--card-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: countUp 2s ease-out;
}

@keyframes countUp {
    from { 
        opacity: 0;
        transform: translateY(30px);
    }
    to { 
        opacity: 1;
        transform: translateY(0);
    }
}

.card-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 10px 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card-icon {
    position: absolute;
    top: 25px;
    right: 25px;
    width: 70px;
    height: 70px;
    background: var(--card-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.card-icon i {
    font-size: 2rem;
    color: white;
    animation: iconFloat 3s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(5deg); }
}

.stats-card:hover .card-icon {
    transform: scale(1.1) rotate(15deg);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
}

.card-footer {
    background: rgba(0, 0, 0, 0.05);
    margin: -25px -25px -25px -25px;
    margin-top: auto;
    padding: 15px 25px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.card-footer:hover {
    background: rgba(0, 0, 0, 0.1);
}

.card-link {
    color: #2c3e50;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.3s ease;
}

.card-link:hover {
    color: #34495e;
    text-decoration: none;
    transform: translateX(5px);
}

.card-link i {
    transition: all 0.3s ease;
}

.card-link:hover i {
    transform: translateX(5px);
}

/* Progressive Loading Animation */
.stats-card {
    opacity: 0;
    transform: translateY(50px);
    animation: slideInUp 0.8s ease forwards;
}

.stats-card:nth-child(1) { animation-delay: 0.1s; }
.stats-card:nth-child(2) { animation-delay: 0.2s; }
.stats-card:nth-child(3) { animation-delay: 0.3s; }
.stats-card:nth-child(4) { animation-delay: 0.4s; }

@keyframes slideInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-number {
        font-size: 2.5rem;
    }
    
    .card-icon {
        width: 50px;
        height: 50px;
    }
    
    .card-icon i {
        font-size: 1.5rem;
    }
    
    .stats-card {
        height: 180px;
    }
}

/* Pulse Effect for Numbers */
.card-number {
    animation: countUp 2s ease-out, pulse 2s infinite 3s;
}

@keyframes pulse {
    0%, 100% { 
        transform: scale(1);
    }
    50% { 
        transform: scale(1.05);
    }
}

/* Gradient Text Animation */
.card-title {
    background: linear-gradient(45deg, #2c3e50, #3498db, #2c3e50);
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradientShift 3s ease-in-out infinite;
}

@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* Modern Dashboard Title */
.dashboard-title {
    text-align: center;
    margin-bottom: 40px;
    padding: 20px 0;
}

.dashboard-title h2 {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.dashboard-subtitle {
    color: #7f8c8d;
    font-size: 1.1rem;
    font-weight: 400;
    margin-top: 10px;
}
</style>

<div class="dashboard-container">
    <div class="dashboard-title">
        <h2><i class="fas fa-users"></i> Statistik Kependudukan</h2>
        <p class="dashboard-subtitle">Data Real-time Desa Lemahabang</p>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="stats-card penduduk">
                <div class="card-inner">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h3 class="card-number" data-target="<?php echo $pend; ?>">0</h3>
                        <p class="card-title">Total Penduduk</p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?page=data-pend" class="card-link">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="stats-card keluarga">
                <div class="card-inner">
                    <div class="card-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div>
                        <h3 class="card-number" data-target="<?php echo $kartu; ?>">0</h3>
                        <p class="card-title">Kartu Keluarga</p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?page=data-kartu" class="card-link">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="stats-card laki-laki">
                <div class="card-inner">
                    <div class="card-icon">
                        <i class="fas fa-male"></i>
                    </div>
                    <div>
                        <h3 class="card-number" data-target="<?php echo $laki; ?>">0</h3>
                        <p class="card-title">Laki-laki</p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?page=data-pend" class="card-link">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="stats-card perempuan">
                <div class="card-inner">
                    <div class="card-icon">
                        <i class="fas fa-female"></i>
                    </div>
                    <div>
                        <h3 class="card-number" data-target="<?php echo $prem; ?>">0</h3>
                        <p class="card-title">Perempuan</p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?page=data-pend" class="card-link">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Animated Counter Function
function animateCounter(target, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        target.textContent = current.toLocaleString();
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

// Initialize counters when page loads
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.card-number');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const endValue = parseInt(target.getAttribute('data-target'));
                animateCounter(target, 0, endValue, 2000);
                observer.unobserve(target);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
    
    // Add hover sound effect (optional)
    const cards = document.querySelectorAll('.stats-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});

// Add loading state
window.addEventListener('load', function() {
    const cards = document.querySelectorAll('.stats-card');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 150);
    });
});
</script>
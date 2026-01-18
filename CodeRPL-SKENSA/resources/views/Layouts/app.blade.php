@extends('layouts.app')

@section('title', 'Alumni - CodeRPL')

@section('styles')
<style>
    /* Additional Styles for Alumni Page */
    .page-header {
        padding: 60px 0;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        text-align: center;
        margin-bottom: 40px;
    }
    
    .page-title {
        font-size: 42px;
        margin-bottom: 15px;
    }
    
    .page-description {
        font-size: 18px;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .angkatan-section {
        margin-bottom: 50px;
    }
    
    .angkatan-header {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-bottom: 25px;
        border-left: 5px solid var(--primary-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .angkatan-title {
        font-size: 24px;
        color: var(--dark-color);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .angkatan-year {
        color: var(--primary-color);
        font-weight: bold;
    }
    
    .angkatan-count {
        background: var(--light-blue);
        color: var(--primary-color);
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 14px;
    }
    
    .alumni-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }
    
    .alumni-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .alumni-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
    }
    
    .alumni-photo {
        height: 200px;
        background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    
    .alumni-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .default-photo {
        font-size: 60px;
        color: var(--primary-color);
        opacity: 0.7;
    }
    
    .alumni-info {
        padding: 25px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .alumni-name {
        font-size: 20px;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 15px;
        line-height: 1.3;
    }
    
    .alumni-details {
        flex: 1;
    }
    
    .detail-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 12px;
        color: var(--gray);
        font-size: 14px;
    }
    
    .detail-item i {
        color: var(--primary-color);
        margin-top: 2px;
        flex-shrink: 0;
        width: 16px;
    }
    
    .detail-item span {
        line-height: 1.4;
    }
    
    .angkatan-navigation {
        position: sticky;
        top: 80px;
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        z-index: 100;
    }
    
    .angkatan-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }
    
    .angkatan-filter {
        padding: 8px 16px;
        background: var(--light-color);
        border: 2px solid #e2e8f0;
        border-radius: 20px;
        text-decoration: none;
        color: var(--dark-color);
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .angkatan-filter:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .angkatan-filter.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .search-section {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }
    
    .search-box {
        display: flex;
        gap: 15px;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .search-input {
        flex: 1;
        padding: 14px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
    }
    
    .search-btn {
        padding: 14px 30px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .search-btn:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .empty-state i {
        font-size: 60px;
        color: var(--primary-color);
        opacity: 0.5;
        margin-bottom: 20px;
    }
    
    .empty-state h3 {
        color: var(--dark-color);
        margin-bottom: 10px;
    }
    
    .empty-state p {
        color: var(--gray);
        max-width: 400px;
        margin: 0 auto;
    }
    
    /* Animation for angkatan sections */
    .angkatan-section {
        animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Back to top button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: var(--primary-color);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        z-index: 1000;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .back-to-top.visible {
        opacity: 1;
    }
    
    .back-to-top:hover {
        background: #1d4ed8;
        transform: translateY(-3px);
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">
            <i class="fas fa-user-graduate"></i> Database Alumni
        </h1>
        <p class="page-description">
            Temukan alumni Jurusan RPL SMKN 1 Denpasar dari angkatan 1 hingga 65. Lihat perkembangan karir mereka setelah lulus.
        </p>
    </div>
</section>

<div class="container">
    <!-- Search Section -->
    <section class="search-section">
        <form action="#" method="GET" class="search-box">
            <input type="text" 
                   class="search-input" 
                   placeholder="Cari alumni berdasarkan nama, angkatan, atau perusahaan..."
                   id="searchAlumni">
            <button type="submit" class="search-btn">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>
    </section>

    <!-- Angkatan Navigation -->
    <section class="angkatan-navigation">
        <div class="angkatan-filters" id="angkatanFilters">
            <!-- Filters will be generated by JavaScript -->
        </div>
    </section>

    <!-- Alumni by Angkatan -->
    <div id="alumniContainer">
        @for($angkatan = 65; $angkatan >= 1; $angkatan--)
        <section class="angkatan-section" id="angkatan-{{ $angkatan }}" data-angkatan="{{ $angkatan }}">
            <div class="angkatan-header">
                <h2 class="angkatan-title">
                    <i class="fas fa-users"></i>
                    Angkatan <span class="angkatan-year">{{ $angkatan }}</span>
                </h2>
                <span class="angkatan-count">{{ rand(8, 25) }} Alumni</span>
            </div>
            
            <div class="alumni-grid">
                <!-- Alumni 1 -->
                <div class="alumni-card">
                    <div class="alumni-photo">
                        <div class="default-photo">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="alumni-info">
                        <h3 class="alumni-name">Budi Santoso</h3>
                        <div class="alumni-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Lulus: {{ 2000 + $angkatan }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>PKL: PT. Teknologi Indonesia</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-building"></i>
                                <span>Bekerja: Google Indonesia</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-briefcase"></i>
                                <span>Posisi: Software Engineer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Alumni 2 -->
                <div class="alumni-card">
                    <div class="alumni-photo">
                        <div class="default-photo">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="alumni-info">
                        <h3 class="alumni-name">Sari Dewi</h3>
                        <div class="alumni-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Lulus: {{ 2000 + $angkatan }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>PKL: Startup Bali Tech</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-building"></i>
                                <span>Bekerja: Tokopedia</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-briefcase"></i>
                                <span>Posisi: Frontend Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Alumni 3 -->
                <div class="alumni-card">
                    <div class="alumni-photo">
                        <div class="default-photo">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="alumni-info">
                        <h3 class="alumni-name">Ari Wibawa</h3>
                        <div class="alumni-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Lulus: {{ 2000 + $angkatan }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>PKL: Bali Digital Studio</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-building"></i>
                                <span>Bekerja: Traveloka</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-briefcase"></i>
                                <span>Posisi: Backend Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Alumni 4 -->
                <div class="alumni-card">
                    <div class="alumni-photo">
                        <div class="default-photo">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="alumni-info">
                        <h3 class="alumni-name">Putu Adi</h3>
                        <div class="alumni-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Lulus: {{ 2000 + $angkatan }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>PKL: PT. Solusi Digital</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-building"></i>
                                <span>Bekerja: Bukalapak</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-briefcase"></i>
                                <span>Posisi: Full Stack Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endfor
    </div>

    <!-- Empty State (hidden by default) -->
    <div class="empty-state" id="emptyState" style="display: none;">
        <i class="fas fa-search"></i>
        <h3>Alumni tidak ditemukan</h3>
        <p>Coba gunakan kata kunci pencarian yang berbeda atau filter angkatan lainnya.</p>
    </div>
</div>

<!-- Back to Top Button -->
<a href="#" class="back-to-top" id="backToTop">
    <i class="fas fa-arrow-up"></i>
</a>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Generate angkatan filters
        const filtersContainer = document.getElementById('angkatanFilters');
        let filtersHTML = '';
        
        // Add "Semua" filter
        filtersHTML += '<a href="#all" class="angkatan-filter active" data-angkatan="all">Semua</a>';
        
        // Generate filters for each angkatan (grouped by decades)
        for(let i = 65; i >= 1; i--) {
            if(i % 10 === 0 || i === 65 || i === 1) {
                // Show decade markers
                if(i === 65) {
                    filtersHTML += `<span style="padding: 8px 5px; color: var(--gray);">|</span>`;
                }
                filtersHTML += `<a href="#angkatan-${i}" class="angkatan-filter" data-angkatan="${i}">${i}</a>`;
            }
        }
        
        // Add "Lainnya" dropdown for other angkatans
        filtersHTML += `
            <div class="angkatan-filter" style="position: relative;">
                <span style="cursor: pointer; display: inline-flex; align-items: center; gap: 5px;">
                    Lainnya <i class="fas fa-chevron-down"></i>
                </span>
                <div class="dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; background: white; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-radius: 8px; padding: 10px; min-width: 150px; z-index: 1000; max-height: 300px; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 5px;">
        `;
        
        // Add all other angkatans to dropdown
        for(let i = 64; i >= 2; i--) {
            if(i % 10 !== 0) {
                filtersHTML += `<a href="#angkatan-${i}" class="angkatan-filter" data-angkatan="${i}" style="font-size: 12px; padding: 5px 10px;">${i}</a>`;
            }
        }
        
        filtersHTML += `
                    </div>
                </div>
            </div>
        `;
        
        filtersContainer.innerHTML = filtersHTML;
        
        // Handle filter clicks
        document.querySelectorAll('.angkatan-filter').forEach(filter => {
            filter.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all filters
                document.querySelectorAll('.angkatan-filter').forEach(f => {
                    f.classList.remove('active');
                });
                
                // Add active class to clicked filter
                this.classList.add('active');
                
                const angkatan = this.getAttribute('data-angkatan');
                
                if(angkatan === 'all') {
                    // Show all angkatans
                    document.querySelectorAll('.angkatan-section').forEach(section => {
                        section.style.display = 'block';
                    });
                    document.getElementById('emptyState').style.display = 'none';
                } else {
                    // Show only selected angkatan
                    document.querySelectorAll('.angkatan-section').forEach(section => {
                        section.style.display = 'none';
                    });
                    
                    const targetSection = document.getElementById(`angkatan-${angkatan}`);
                    if(targetSection) {
                        targetSection.style.display = 'block';
                        document.getElementById('emptyState').style.display = 'none';
                        
                        // Scroll to the section
                        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });
        
        // Handle "Lainnya" dropdown
        const lainnyaBtn = filtersContainer.querySelector('.angkatan-filter span');
        const dropdownMenu = filtersContainer.querySelector('.dropdown-menu');
        
        lainnyaBtn.addEventListener('click', function() {
            dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if(!e.target.closest('.angkatan-filter')) {
                dropdownMenu.style.display = 'none';
            }
        });
        
        // Search functionality
        const searchInput = document.getElementById('searchAlumni');
        const alumniCards = document.querySelectorAll('.alumni-card');
        const angkatanSections = document.querySelectorAll('.angkatan-section');
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            let hasResults = false;
            
            if(searchTerm === '') {
                // Show all if search is empty
                alumniCards.forEach(card => {
                    card.style.display = 'flex';
                });
                angkatanSections.forEach(section => {
                    section.style.display = 'block';
                });
                document.getElementById('emptyState').style.display = 'none';
                return;
            }
            
            // Hide all sections first
            angkatanSections.forEach(section => {
                section.style.display = 'none';
            });
            
            // Search through alumni cards
            alumniCards.forEach(card => {
                const alumniName = card.querySelector('.alumni-name').textContent.toLowerCase();
                const alumniDetails = card.querySelector('.alumni-details').textContent.toLowerCase();
                
                if(alumniName.includes(searchTerm) || alumniDetails.includes(searchTerm)) {
                    card.style.display = 'flex';
                    hasResults = true;
                    
                    // Show the parent angkatan section
                    const angkatanSection = card.closest('.angkatan-section');
                    if(angkatanSection) {
                        angkatanSection.style.display = 'block';
                    }
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show empty state if no results
            if(!hasResults) {
                document.getElementById('emptyState').style.display = 'block';
            } else {
                document.getElementById('emptyState').style.display = 'none';
            }
        });
        
        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if(window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Highlight angkatan in URL hash
        if(window.location.hash) {
            const hash = window.location.hash.replace('#', '');
            if(hash.startsWith('angkatan-')) {
                const angkatan = hash.replace('angkatan-', '');
                const filter = document.querySelector(`.angkatan-filter[data-angkatan="${angkatan}"]`);
                if(filter) {
                    filter.click();
                }
            }
        }
    });
</script>
@endsection
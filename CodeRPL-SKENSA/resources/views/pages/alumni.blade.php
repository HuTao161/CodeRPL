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
        position: relative;
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
        cursor: pointer;
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

    /* Photo placeholder */
    .photo-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 40px;
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
            Temukan alumni Jurusan RPL SMKN 1 Denpasar dari berbagai angkatan. Lihat perkembangan karir mereka setelah lulus.
        </p>
    </div>
</section>

<div class="container">
    <!-- Search Section -->
    <section class="search-section">
        <form action="{{ route('alumni.search') }}" method="GET" class="search-box" id="searchForm">
            @csrf
            <input type="text" 
                   class="search-input" 
                   name="search"
                   placeholder="Cari alumni berdasarkan nama, angkatan, atau perusahaan..."
                   id="searchAlumni"
                   value="{{ request('search') }}">
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
        @if($alumniByAngkatan->isEmpty())
            <div class="empty-state" id="emptyState">
                <i class="fas fa-user-graduate"></i>
                <h3>Data alumni belum tersedia</h3>
                <p>Belum ada data alumni yang dapat ditampilkan.</p>
            </div>
        @else
            @foreach($alumniByAngkatan as $angkatan => $alumniList)
                <section class="angkatan-section" id="angkatan-{{ $angkatan }}" data-angkatan="{{ $angkatan }}">
                    <div class="angkatan-header">
                        <h2 class="angkatan-title">
                            <i class="fas fa-users"></i>
                            Angkatan <span class="angkatan-year">{{ $angkatan }}</span>
                        </h2>
                        <span class="angkatan-count">{{ $alumniList->count() }} Alumni</span>
                    </div>
                    
                    <div class="alumni-grid">
                        @foreach($alumniList as $alumni)
                            <div class="alumni-card" data-name="{{ strtolower($alumni->nama) }}" 
                                 data-angkatan="{{ $angkatan }}"
                                 data-pkl="{{ strtolower($alumni->tempat_pkl ?? '') }}"
                                 data-kerja="{{ strtolower($alumni->tempat_kerja ?? '') }}">
                                <div class="alumni-photo">
                                    @if($alumni->foto)
                                        <img src="{{ asset('storage/alumni/' . $alumni->foto) }}" 
                                             alt="{{ $alumni->nama }}"
                                             onerror="this.onerror=null; this.src='{{ asset('images/default-avatar.png') }}';">
                                    @else
                                        <div class="photo-placeholder">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="alumni-info">
                                    <h3 class="alumni-name">{{ $alumni->nama }}</h3>
                                    <div class="alumni-details">
                                        <div class="detail-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Tahun Lulus: {{ $alumni->tahun_lulus ?? 'Tidak diketahui' }}</span>
                                        </div>
                                        @if($alumni->tempat_pkl)
                                        <div class="detail-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>PKL: {{ $alumni->tempat_pkl }}</span>
                                        </div>
                                        @endif
                                        @if($alumni->tempat_kerja)
                                        <div class="detail-item">
                                            <i class="fas fa-building"></i>
                                            <span>Bekerja: {{ $alumni->tempat_kerja }}</span>
                                        </div>
                                        @endif
                                        @if($alumni->jabatan)
                                        <div class="detail-item">
                                            <i class="fas fa-briefcase"></i>
                                            <span>Posisi: {{ $alumni->jabatan }}</span>
                                        </div>
                                        @endif
                                        @if($alumni->kontak)
                                        <div class="detail-item">
                                            <i class="fas fa-phone"></i>
                                            <span>Kontak: {{ $alumni->kontak }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        @endif
    </div>

    <!-- Empty State for search results -->
    <div class="empty-state" id="searchEmptyState" style="display: none;">
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
        // Get unique angkatans from DOM
        const angkatanSections = document.querySelectorAll('.angkatan-section');
        const angkatanNumbers = Array.from(angkatanSections)
            .map(section => parseInt(section.dataset.angkatan))
            .sort((a, b) => b - a); // Sort descending
        
        // Generate angkatan filters
        const filtersContainer = document.getElementById('angkatanFilters');
        let filtersHTML = '';
        
        if (angkatanNumbers.length > 0) {
            // Add "Semua" filter
            filtersHTML += '<span class="angkatan-filter active" data-angkatan="all">Semua</span>';
            
            // Generate filters for each angkatan
            angkatanNumbers.forEach((angkatan, index) => {
                if (index < 8) { // Show first 8 angkatans
                    filtersHTML += `<span class="angkatan-filter" data-angkatan="${angkatan}">${angkatan}</span>`;
                }
            });
            
            // Add "Lainnya" dropdown for other angkatans if there are more than 8
            if (angkatanNumbers.length > 8) {
                filtersHTML += `
                    <span class="angkatan-filter" id="moreAngkatan" style="position: relative;">
                        Lainnya <i class="fas fa-chevron-down"></i>
                        <div class="dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; background: white; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-radius: 8px; padding: 10px; min-width: 150px; z-index: 1000; max-height: 300px; overflow-y: auto;">
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 5px;">
                `;
                
                // Add remaining angkatans to dropdown
                angkatanNumbers.slice(8).forEach(angkatan => {
                    filtersHTML += `<span class="angkatan-filter" data-angkatan="${angkatan}" style="font-size: 12px; padding: 5px 10px;">${angkatan}</span>`;
                });
                
                filtersHTML += `
                            </div>
                        </div>
                    </span>
                `;
            }
        }
        
        filtersContainer.innerHTML = filtersHTML;
        
        // Handle filter clicks
        document.querySelectorAll('.angkatan-filter').forEach(filter => {
            filter.addEventListener('click', function(e) {
                e.preventDefault();
                
                const angkatan = this.getAttribute('data-angkatan');
                
                // Remove active class from all filters
                document.querySelectorAll('.angkatan-filter').forEach(f => {
                    f.classList.remove('active');
                });
                
                // Add active class to clicked filter
                this.classList.add('active');
                
                if(angkatan === 'all') {
                    // Show all angkatans
                    document.querySelectorAll('.angkatan-section').forEach(section => {
                        section.style.display = 'block';
                    });
                    document.getElementById('searchEmptyState').style.display = 'none';
                } else {
                    // Show only selected angkatan
                    document.querySelectorAll('.angkatan-section').forEach(section => {
                        section.style.display = 'none';
                    });
                    
                    const targetSection = document.getElementById(`angkatan-${angkatan}`);
                    if(targetSection) {
                        targetSection.style.display = 'block';
                        document.getElementById('searchEmptyState').style.display = 'none';
                        
                        // Scroll to the section
                        setTimeout(() => {
                            targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }, 100);
                    }
                }
            });
        });
        
        // Handle "Lainnya" dropdown
        const moreAngkatan = document.getElementById('moreAngkatan');
        if (moreAngkatan) {
            const dropdownMenu = moreAngkatan.querySelector('.dropdown-menu');
            
            moreAngkatan.addEventListener('click', function(e) {
                if (!e.target.classList.contains('angkatan-filter')) {
                    dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
                }
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('#moreAngkatan')) {
                    dropdownMenu.style.display = 'none';
                }
            });
        }
        
        // Search functionality
        const searchInput = document.getElementById('searchAlumni');
        const searchForm = document.getElementById('searchForm');
        const alumniCards = document.querySelectorAll('.alumni-card');
        const angkatanSectionsArray = document.querySelectorAll('.angkatan-section');
        const searchEmptyState = document.getElementById('searchEmptyState');
        
        // Real-time search for frontend filtering
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            let hasResults = false;
            
            if(searchTerm === '') {
                // Show all if search is empty
                alumniCards.forEach(card => {
                    card.style.display = 'flex';
                });
                angkatanSectionsArray.forEach(section => {
                    section.style.display = 'block';
                });
                searchEmptyState.style.display = 'none';
                return;
            }
            
            // Search through alumni cards
            alumniCards.forEach(card => {
                const alumniName = card.dataset.name;
                const alumniAngkatan = card.dataset.angkatan;
                const alumniPkl = card.dataset.pkl;
                const alumniKerja = card.dataset.kerja;
                
                if(alumniName.includes(searchTerm) || 
                   alumniAngkatan.includes(searchTerm) ||
                   alumniPkl.includes(searchTerm) ||
                   alumniKerja.includes(searchTerm)) {
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
            
            // Hide empty angkatan sections
            angkatanSectionsArray.forEach(section => {
                const visibleCards = section.querySelectorAll('.alumni-card[style*="display: flex"]');
                if (visibleCards.length === 0) {
                    section.style.display = 'none';
                }
            });
            
            // Show empty state if no results
            if(!hasResults) {
                searchEmptyState.style.display = 'block';
            } else {
                searchEmptyState.style.display = 'none';
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
                    setTimeout(() => {
                        filter.click();
                    }, 500);
                }
            }
        }
    });
</script>
@endsection
@extends('layouts.app')

@section('title', 'المرضى - Dumur')

@section('content')
<div class="row justify-content-center">
    <x-navbar />
</div>

<!-- Hero Section -->
<section class="patients-hero text-center">
    <div class="container">
        <h1 class="hero-title">ساعد <span>المرضى</span></h1>
        <p class="hero-subtitle">كن جزءاً من رحلة الشفاء وساهم في إنقاذ الأرواح</p>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="filter-container">
                    <h5 class="filter-title">اختر نوع الحالات:</h5>
                    <div class="filter-buttons">
                        <a href="{{ route('patients.index', ['filter' => 'all']) }}" 
                           class="filter-btn {{ $filter == 'all' ? 'active' : '' }}">
                            <i class="fas fa-list"></i> جميع الحالات
                        </a>
                        <a href="{{ route('patients.index', ['filter' => 'active']) }}" 
                           class="filter-btn {{ $filter == 'active' ? 'active' : '' }}">
                            <i class="fas fa-heartbeat"></i> الحالات النشطة
                        </a>
                        <a href="{{ route('patients.index', ['filter' => 'ending_soon']) }}" 
                           class="filter-btn {{ $filter == 'ending_soon' ? 'active' : '' }}">
                            <i class="fas fa-clock"></i> تنتهي قريباً
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Patients Section -->
<section class="patients-section py-5">
    <div class="container">
        <div class="row">
            @forelse($patients as $patient)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="patient-card">
                    <div class="patient-image">
                        @if($patient->patient_photo)
                        <img src="{{ asset('storage/' . $patient->patient_photo) }}" alt="{{ $patient->name }}">
                        @else
                        <div class="patient-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        @endif
                        
                        <!-- Urgency Badge -->
                        @if($patient->days_remaining <= 7 && $patient->days_remaining > 0)
                            <div class="urgency-badge urgent">
                                <i class="fas fa-exclamation-triangle"></i>
                                عاجل
                            </div>
                        @elseif($patient->days_remaining <= 30 && $patient->days_remaining > 7)
                            <div class="urgency-badge moderate">
                                <i class="fas fa-clock"></i>
                                قريباً
                            </div>
                        @endif
                    </div>
                    
                    <div class="patient-content">
                        <h4 class="patient-name">{{ $patient->name }}</h4>
                        <div class="patient-details">
                            <div class="detail-item">
                                <i class="fas fa-birthday-cake"></i>
                                <span>{{ $patient->age }} سنة</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-hospital"></i>
                                <span>{{ $patient->hospital_name }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-user-md"></i>
                                <span>د. {{ $patient->doctor_name }}</span>
                            </div>
                        </div>
                        
                        <!-- Progress -->
                        <div class="progress-container">
                            <div class="progress-header">
                                <span class="progress-label">المبلغ المطلوب</span>
                                <span class="progress-percentage">{{ number_format($patient->progress_percentage, 1) }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $patient->progress_percentage }}%"></div>
                            </div>
                            <div class="progress-amounts">
                                <span class="collected">{{ number_format($patient->collected_amount) }} جنيه</span>
                                <span class="target">من {{ number_format($patient->target_amount) }} جنيه</span>
                            </div>
                        </div>
                        
                        <!-- Time Remaining -->
                        <div class="time-info">
                            @if($patient->days_remaining > 0)
                                <div class="time-remaining">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $patient->days_remaining }} يوم متبقي</span>
                                </div>
                            @else
                                <div class="time-expired">
                                    <i class="fas fa-times-circle"></i>
                                    <span>انتهت المدة</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Donate Button -->
                        <div class="donate-section">
                            <button class="donate-btn">
                                <i class="fas fa-heart"></i>
                                <span>تبرع الآن</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-heart-broken"></i>
                    </div>
                    <h4>لا توجد حالات حالياً</h4>
                    <p>لم يتم العثور على حالات في هذا التصنيف</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
/* Hero Section */
.patients-hero {
    background: linear-gradient(135deg, rgba(3, 105, 126, 0.9), rgba(74, 145, 153, 0.8)), url('{{ asset("imgs/domor.png") }}');
    background-size: cover;
    background-position: center;
    padding: 100px 0 80px;
    color: white;
    margin-top: 80px;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 1rem;
}

.hero-title span {
    color: #B12E2E;
    text-shadow: 0 0 20px rgba(177, 46, 46, 0.5);
}

.hero-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
}

/* Filter Section */
.filter-section {
    background: #f8f9fa;
}

.filter-container {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.filter-title {
    color: #03697E;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.filter-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    color: #03697E;
    border-color: #03697E;
    text-decoration: none;
}

.filter-btn.active {
    background: linear-gradient(135deg, #03697E, #4A9199);
    color: white;
    border-color: transparent;
    box-shadow: 0 4px 15px rgba(3, 105, 126, 0.3);
}

/* Patient Cards */
.patients-section {
    background: #f8f9fa;
}

.patient-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.patient-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.patient-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.patient-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.patient-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #03697E, #4A9199);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
}

.urgency-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.urgency-badge.urgent {
    background: rgba(220, 53, 69, 0.9);
    color: white;
}

.urgency-badge.moderate {
    background: rgba(255, 193, 7, 0.9);
    color: #856404;
}

.patient-content {
    padding: 1.5rem;
}

.patient-name {
    color: #03697E;
    font-weight: 800;
    font-size: 1.3rem;
    margin-bottom: 1rem;
    text-align: center;
}

.patient-details {
    margin-bottom: 1.5rem;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.5rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.detail-item i {
    color: #03697E;
    width: 16px;
}

/* Progress */
.progress-container {
    margin-bottom: 1.5rem;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.progress-label {
    font-weight: 600;
    color: #03697E;
    font-size: 0.9rem;
}

.progress-percentage {
    font-weight: 700;
    color: #28a745;
    font-size: 0.9rem;
}

.progress-bar {
    height: 10px;
    background: #e9ecef;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(135deg, #28a745, #20c997);
    border-radius: 10px;
    transition: width 0.3s ease;
}

.progress-amounts {
    display: flex;
    justify-content: space-between;
    font-size: 0.8rem;
}

.collected {
    color: #28a745;
    font-weight: 600;
}

.target {
    color: #6c757d;
}

/* Time Info */
.time-info {
    margin-bottom: 1.5rem;
    text-align: center;
}

.time-remaining {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255, 193, 7, 0.1);
    color: #856404;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    border: 1px solid rgba(255, 193, 7, 0.3);
}

.time-expired {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(220, 53, 69, 0.1);
    color: #721c24;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    border: 1px solid rgba(220, 53, 69, 0.3);
}

/* Donate Button */
.donate-section {
    text-align: center;
}

.donate-btn {
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, #03697E, #4A9199);
    color: white;
    border: none;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    cursor: pointer;
}

.donate-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(3, 105, 126, 0.3);
    background: linear-gradient(135deg, #4A9199, #03697E);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.empty-icon {
    font-size: 4rem;
    color: #6c757d;
    margin-bottom: 1.5rem;
}

.empty-state h4 {
    color: #03697E;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #6c757d;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-btn {
        width: 200px;
        justify-content: center;
    }
}
</style>
@endsection
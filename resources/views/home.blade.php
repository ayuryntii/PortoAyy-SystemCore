@extends('layouts.master')

@section('title', 'INITIALIZING_SYS')

@push('styles')
<style>
    .init-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 3rem;
        align-items: center;
    }
    
    .status-terminal {
        background: rgba(0, 243, 255, 0.05);
        border: 1px solid var(--sys-border);
        position: relative;
        padding: 2.5rem 1.5rem 1.5rem 1.5rem;
        font-family: var(--font-mono);
        color: var(--sys-success);
        font-size: 0.85rem;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .status-terminal::before {
        content: 'TERMINAL_SESSION: v1.0.4';
        position: absolute;
        top: 0; left: 0; width: 100%;
        background: var(--sys-border);
        color: var(--sys-bg);
        padding: 2px 10px;
        font-size: 0.65rem;
        font-weight: bold;
    }

    .terminal-dots {
        position: absolute;
        top: 5px; right: 10px;
        display: flex; gap: 5px;
    }
    .dot { width: 6px; height: 6px; border-radius: 50%; }
    .dot-r { background: #ff5f56; }
    .dot-y { background: #ffbd2e; }
    .dot-g { background: #27c93f; }

    .typing {
        border-right: 2px solid var(--sys-success);
        white-space: nowrap;
        overflow: hidden;
        animation: typing 3.5s steps(40, end), blink-caret .75s step_end infinite;
    }

    @keyframes typing { from { width: 0 } to { width: 100% } }
    @keyframes blink_caret { from, to { border_color: transparent } 50% { border_color: var(--sys-success); } }

    .cursor {
        display: inline-block;
        width: 10px;
        height: 1.2rem;
        background: var(--sys-primary);
        margin-left: 5px;
        animation: blink 0.8s infinite;
        vertical-align: middle;
    }

    @keyframes blink { 50% { opacity: 0; } }

    .stat-row {
        display: flex;
        gap: 2rem;
        margin-top: 3rem;
        border-top: 1px solid var(--sys-border);
        padding-top: 2rem;
    }

    .stat-box { font-family: var(--font-mono); }
    .stat-val { font-size: 2rem; color: #fff; font-weight: 700; }
    .stat-lab { font-size: 0.7rem; color: var(--sys-primary); }

    .profile-frame {
        width: 350px;
        height: 350px;
        border: 1px solid var(--sys-primary);
        padding: 15px;
        position: relative;
        background: rgba(0, 243, 255, 0.02);
    }

    .profile-frame::before, .profile-frame::after {
        content: '';
        position: absolute;
        width: 40px; height: 40px;
        border: 3px solid var(--sys-primary);
    }

    .profile-frame::before { top: -5px; left: -5px; border-right: 0; border-bottom: 0; }
    .profile-frame::after { bottom: -5px; right: -5px; border-left: 0; border-top: 0; }

    .profile-frame img {
        width: 100%; height: 100%;
        object-fit: cover;
        filter: grayscale(0.2) contrast(1.1) brightness(0.9);
        border: 1px solid var(--sys-border);
    }

    .category-header {
        font-family: var(--font-mono);
        font-size: 0.8rem;
        color: var(--sys-primary);
        margin: 3rem 0 1.5rem 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .category-header::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, var(--sys-border), transparent);
    }

    .skill-card {
        padding: 1.5rem; 
        border: 1px solid var(--sys-border); 
        background: rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .skill-card:hover {
        border-color: var(--sys-primary);
        background: rgba(0, 243, 255, 0.05);
        transform: translateY(-5px);
    }

    .skill-card::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 2px;
        background: var(--sys-primary);
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }

    .skill-card:hover::after {
        transform: translateX(0);
    }

    .cv-btn {
        background: var(--sys-secondary);
        color: #fff;
        border: 1px solid var(--sys-secondary);
        box-shadow: 0 0 15px rgba(255, 0, 255, 0.3);
    }

    .cv-btn:hover {
        background: transparent;
        color: var(--sys-secondary);
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.5);
    }

    @media (max-width: 900px) {
        .init-grid { grid-template-columns: 1fr; }
        .profile-frame { width: 280px; height: 280px; margin: 0 auto; }
    }


</style>
@endpush

@section('content')
<div class="init-grid" data-aos="fade-in">
    <div class="hero-text">
        <div class="status-terminal">
            <div class="terminal-dots">
                <div class="dot dot-r"></div>
                <div class="dot dot-y"></div>
                <div class="dot dot-g"></div>
            </div>
            <div class="typing">
                > SYSTEM_BOOT_COMPLETE<br>
                > OPERATOR: AYU_RIANTI<br>
                > STATUS: ONLINE / ACTIVE<br>
                > UPTIME: {{ floor(microtime(true) - strtotime('today')) }}s<br>
                > LOAD: [||||||||||] 100%
            </div>
        </div>
        
        <h1>INITIALIZING <span>HOME_SYS</span><span class="cursor"></span></h1>
        
        <p style="font-size: 1.1rem; color: var(--sys-text); max-width: 650px; margin-bottom: 2rem; font-family: var(--font-sans);">
            As a <strong>Software Engineer</strong>, I architect scalable digital infrastructures and deploy high-performance system modules. Specialized in full-stack engineering with a focus on core stability and efficient data pipelines.
        </p>
        
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="{{ route('project') }}" class="btn-primary">
                <i class="fas fa-terminal"></i> EXECUTE_MODULES
            </a>
            <a href="{{ route('about') }}" class="btn-outline">
                <i class="fas fa-shield-alt"></i> VIEW_CREDENTIALS
            </a>
            <button onclick="downloadCV()" class="btn-outline cv-btn" style="width: auto;">
                <i class="fas fa-download"></i> DOWNLOAD_CV
            </button>
        </div>
        
        <div class="stat-row">
            <div class="stat-box">
                <div class="stat-val">04+</div>
                <div class="stat-lab">EXP_YEARS</div>
            </div>
            <div class="stat-box">
                <div class="stat-val">15+</div>
                <div class="stat-lab">TECH_SKILLS</div>
            </div>
            <div class="stat-box">
                <div class="stat-val">3.85</div>
                <div class="stat-lab">ACADEMIC_GPA</div>
            </div>
        </div>
    </div>
    
    <div class="profile-frame" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('images/foto-ayu.jpg') }}" alt="{{ $name }}" onerror="this.src='https://ui-avatars.com/api/?name=Ayu+Rianti&background=0284c7&color=fff&size=400&rounded=true&bold=true'">
    </div>
</div>

<!-- Skills Data Grid -->
<div class="card" style="margin-top: 5rem;" data-aos="fade-up">
    <h2><i class="fas fa-microchip"></i> TECHNICAL_SPECIFICATIONS</h2>
    
    @foreach($skills as $category => $categorySkills)
    <div class="category-header">
        <i class="fas {{ $category == 'BACKEND_CORE' ? 'fa-server' : ($category == 'FRONTEND_INTERFACE' ? 'fa-desktop' : 'fa-cogs') }}"></i>
        {{ str_replace('_', ' ', $category) }}
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
        @foreach($categorySkills as $skill)
        <div class="skill-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <i class="{{ $skill['icon'] }}" style="color: {{ $skill['color'] }}; font-size: 1.8rem;"></i>
                <span style="font-family: var(--font-mono); font-size: 0.8rem; color: var(--sys-success);">[STABLE]</span>
            </div>
            <div style="font-family: var(--font-mono); font-weight: 700; color: #fff; margin-bottom: 0.2rem;">{{ strtoupper($skill['name']) }}</div>
            <div style="font-size: 0.7rem; color: var(--sys-text-muted); margin-bottom: 1rem;">VERS: {{ $skill['years'] }}</div>
            
            <div style="height: 4px; background: #222; width: 100%; position: relative;">
                <div style="position: absolute; left: 0; top: 0; height: 100%; background: var(--sys-primary); width: {{ $skill['level'] }}%; box-shadow: 0 0 10px var(--sys-primary);"></div>
            </div>
            <div style="display: flex; justify-content: space-between; font-family: var(--font-mono); font-size: 0.6rem; margin-top: 0.5rem;">
                <span>LOAD_CAPACITY</span>
                <span>{{ $skill['level'] }}%</span>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>

<div class="card" data-aos="fade-up">
    <h2><i class="fas fa-file-signature"></i> ACADEMIC_VALIDATIONS</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        @foreach($testimonials as $testi)
        <div style="border: 1px dashed var(--sys-border); padding: 1.5rem;">
            <p style="font-family: var(--font-mono); font-size: 0.9rem; color: var(--sys-success); margin-bottom: 1.5rem;">"{{ $testi['text'] }}"</p>
            <div style="display: flex; align-items: center; gap: 1rem; border-top: 1px solid var(--sys-border); padding-top: 1rem;">
                <div style="font-family: var(--font-mono); font-weight: bold; color: var(--sys-primary);">{{ strtoupper($testi['name']) }}</div>
                <div style="font-size: 0.7rem; color: var(--sys-text-muted);">// {{ strtoupper($testi['role']) }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('partials.cv_template')
@endsection

@extends('layouts.master')

@section('title', 'CORE_RECORDS')

@push('styles')
<style>
    .record-timeline {
        position: relative;
        padding-left: 3rem;
        margin-top: 3rem;
    }
    .record-timeline::before {
        content: '';
        position: absolute;
        left: 0; top: 0;
        width: 2px; height: 100%;
        background: repeating-linear-gradient(to bottom, var(--sys-primary), var(--sys-primary) 10px, transparent 10px, transparent 20px);
    }

    .record-node {
        position: relative;
        margin-bottom: 4rem;
        background: rgba(0, 243, 255, 0.02);
        border: 1px solid var(--sys-border);
        padding: 2rem;
    }

    .record-node::before {
        content: '';
        position: absolute;
        left: -3rem; top: 2rem;
        width: 14px; height: 14px;
        background: var(--sys-bg);
        border: 2px solid var(--sys-primary);
        transform: translateX(-50%) rotate(45deg);
        box-shadow: 0 0 10px var(--sys-primary);
    }

    .record-tag {
        font-family: var(--font-mono);
        font-size: 0.7rem;
        color: var(--sys-primary);
        background: rgba(0, 243, 255, 0.1);
        padding: 0.2rem 0.6rem;
        border: 1px solid var(--sys-border);
        margin-bottom: 1rem;
        display: inline-block;
    }

    .record-header {
        font-family: var(--font-mono);
        font-size: 1.6rem;
        color: #fff;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .record-sub {
        font-family: var(--font-mono);
        color: var(--sys-success);
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .record-log {
        background: #000;
        padding: 1rem;
        border: 1px solid #222;
        font-family: var(--font-mono);
        font-size: 0.75rem;
        color: var(--sys-text-muted);
        line-height: 1.6;
    }

    .cert-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .cert-box {
        border: 1px solid var(--sys-border);
        padding: 1.2rem;
        display: flex;
        gap: 1rem;
        background: rgba(0, 243, 255, 0.03);
    }
</style>
@endpush

@section('content')
<div data-aos="fade-in">
    <h1>ACADEMIC <span>EDUCATION_RECORDS</span></h1>
    <p style="color: var(--sys-text-muted); font-family: var(--font-mono); margin-bottom: 1rem;">
        > FETCHING: /ROOT/ARCHIVES/ACADEMIC/*<br>
        > RECORDS_FOUND: {{ count($educations) }}
    </p>

    <div class="record-timeline">
        @foreach($educations as $edu)
        <div class="record-node" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="record-tag">TIMESTAMP: [{{ $edu['tahun'] }}]</div>
            <div class="record-header">{{ strtoupper($edu['sekolah']) }}</div>
            <div class="record-sub">> {{ strtoupper($edu['jurusan']) }} // GPA: {{ $edu['ipk'] }}</div>
            
            <div class="record-log">
                <span style="color: var(--sys-primary);">[METADATA]</span> {{ $edu['deskripsi'] }}<br>
                <span style="color: var(--sys-success);">[ACHIEVEMENTS]</span> {{ $edu['achievements'] }}
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="card" style="margin-top: 3rem;" data-aos="fade-up">
    <h2><i class="fas fa-certificate"></i> VERIFIED_CERTIFICATIONS</h2>
    <div class="cert-grid">
        @foreach($certifications as $cert)
        <div class="cert-box">
            <i class="{{ $cert['icon'] }}" style="color: var(--sys-primary); font-size: 1.5rem;"></i>
            <div style="font-family: var(--font-mono); font-size: 0.8rem;">
                <div style="color: #fff;">{{ $cert['name'] }}</div>
                <div style="color: var(--sys-text-muted);">ISSUER: {{ $cert['issuer'] }} ({{ $cert['year'] }})</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'OP_CREDENTIALS')

@push('styles')
<style>
    .cred-grid {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 3rem;
    }

    .cred-list {
        list-style: none;
        font-family: var(--font-mono);
    }
    .cred-list li {
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: rgba(0, 243, 255, 0.03);
        border: 1px solid var(--sys-border);
    }
    .cred-list .label {
        font-size: 0.7rem;
        color: var(--sys-primary);
        margin-bottom: 0.3rem;
    }
    .cred-list .val {
        font-weight: 600;
        color: #fff;
    }

    .exp-node {
        border-left: 2px dashed var(--sys-primary);
        padding-left: 2rem;
        margin-bottom: 3rem;
        position: relative;
    }
    .exp-node::before {
        content: '';
        position: absolute;
        left: -6px; top: 0;
        width: 10px; height: 10px;
        background: var(--sys-primary);
        box-shadow: 0 0 10px var(--sys-primary);
    }

    @media (max-width: 900px) {
        .cred-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
<div data-aos="fade-in">
    <h1>OPERATOR_<span>ABOUT_SYS</span></h1>
    <p style="color: var(--sys-text-muted); font-family: var(--font-mono); margin-bottom: 3rem;">
        > ACCESSING: /ROOT/USERS/AYU_RIANTI/BIO.DATA<br>
        > STATUS: DECRYPTED
    </p>

    <div class="cred-grid">
        <!-- Left: Static Data -->
        <div class="card" data-aos="fade-right">
            <div style="text-align: center; margin-bottom: 2rem;">
                <div style="width: 180px; height: 180px; margin: 0 auto; border: 2px solid var(--sys-primary); padding: 10px;">
                    <img src="{{ asset('images/foto-ayu.jpg') }}" alt="{{ $name }}" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(1);" onerror="this.src='https://ui-avatars.com/api/?name=Ayu+Rianti&background=0284c7&color=fff&size=200&rounded=true&bold=true'">
                </div>
            </div>

            <h2>SYSLOG.INFO</h2>
            <ul class="cred-list">
                <li>
                    <div class="label">IDENTIFIER</div>
                    <div class="val">{{ strtoupper($name) }}</div>
                </li>
                <li>
                    <div class="label">SERIAL_ID</div>
                    <div class="val">{{ $nim }}</div>
                </li>
                <li>
                    <div class="label">COMMS_CHANNEL</div>
                    <div class="val">{{ $email }}</div>
                </li>
                <li>
                    <div class="label">LOC_COORD</div>
                    <div class="val">{{ strtoupper($address) }}</div>
                </li>
                <li>
                    <div class="label">STATION</div>
                    <div class="val">{{ strtoupper($campus) }}</div>
                </li>
            </ul>
            <div style="margin-top: 2rem;">
                <button onclick="downloadCV()" class="btn-outline" style="width: 100%; justify-content: center; background: var(--sys-secondary); color: #fff; border-color: var(--sys-secondary); box-shadow: 0 0 10px rgba(255,0,255,0.2);">
                    <i class="fas fa-download"></i> DOWNLOAD_CV_MASTER
                </button>
            </div>
        </div>

        <!-- Right: Dynamic Bio & Exp -->
        <div style="display: flex; flex-direction: column; gap: 2.5rem;" data-aos="fade-left">
            <div class="card">
                <h2>CORE_MISSION.MD</h2>
                <p style="line-height: 1.8; color: var(--sys-text); font-family: var(--font-sans);">
                    {{ $bio }}
                </p>

                <div style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 0.8rem;">
                    <span class="skill-tag">[LARAVEL_ARCH]</span>
                    <span class="skill-tag">[GO_PIPELINES]</span>
                    <span class="skill-tag">[DOCKER_CONTAINERS]</span>
                    <span class="skill-tag">[REACT_HUDS]</span>
                    <span class="skill-tag">[SQL_QUERIES]</span>
                    <span class="skill-tag">[AWS_CLUSTERS]</span>
                </div>
            </div>

            <div class="card">
                <h2>SERVICE_HISTORY.LOG</h2>
                <div style="margin-top: 2rem;">
                    @foreach($experiences as $exp)
                    <div class="exp-node">
                        <div style="font-family: var(--font-mono); color: var(--sys-primary); font-size: 0.8rem; margin-bottom: 0.5rem;">
                            [{{ $exp['year'] }}] // {{ strtoupper($exp['company'] ?? 'STATION_UNKNOWN') }}
                        </div>
                        <h3 style="color: #fff; font-size: 1.3rem; margin-bottom: 1rem;">{{ strtoupper($exp['title']) }}</h3>
                        <p style="color: var(--sys-text-muted); font-size: 0.9rem;">{{ $exp['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.cv_template')
@endsection

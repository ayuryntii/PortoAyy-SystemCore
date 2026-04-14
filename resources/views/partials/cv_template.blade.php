<div id="cv-template" style="display: none;">
    <div style="font-family: 'Inter', sans-serif; color: #111; padding: 40px; background: #fff; width: 800px; margin: 0 auto;">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #00f3ff; padding-bottom: 20px; margin-bottom: 30px;">
            <div>
                <h1 style="font-size: 32px; margin: 0; color: #000; text-transform: uppercase; letter-spacing: 1px;">{{ $name }}</h1>
                <p style="font-size: 16px; color: #00f3ff; font-weight: bold; margin: 5px 0;">SOFTWARE ENGINEER</p>
                <div style="font-size: 12px; color: #666; margin-top: 10px;">
                    <span><i class="fas fa-envelope"></i> {{ $email }}</span> | 
                    <span><i class="fas fa-phone"></i> {{ $phone }}</span> | 
                    <span><i class="fas fa-map-marker-alt"></i> {{ $address ?? 'Cirebon, West Java' }}</span>
                </div>
            </div>
            <div style="width: 120px; height: 120px; border: 4px solid #f3f4f6; overflow: hidden;">
                <img src="{{ asset('images/foto-ayu.jpg') }}" 
                     onerror="this.src='https://ui-avatars.com/api/?name=Ayu+Rianti&background=0284c7&color=fff&size=400&bold=true'"
                     style="width: 100%; height: 100%; object-fit: cover;"
                     crossorigin="anonymous">
            </div>
        </div>

        <!-- Bio -->
        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 18px; border-left: 4px solid #00f3ff; padding-left: 10px; margin-bottom: 15px;">PROFESSIONAL SUMMARY</h2>
            <p style="font-size: 13px; line-height: 1.6; color: #333;">{{ $bio ?? 'Passionate Software Engineer specializing in scalable digital infrastructures.' }}</p>
        </div>

        <!-- Skills -->
        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 18px; border-left: 4px solid #00f3ff; padding-left: 10px; margin-bottom: 15px;">TECHNICAL SPECIFICATIONS</h2>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                @foreach($skills as $category => $categorySkills)
                <div>
                    <h3 style="font-size: 14px; color: #666; margin-bottom: 10px; text-transform: uppercase;">{{ str_replace('_', ' ', $category) }}</h3>
                    <ul style="list-style: none; padding: 0; font-size: 12px;">
                        @foreach($categorySkills as $skill)
                        <li style="margin-bottom: 5px; display: flex; justify-content: space-between;">
                            <span>{{ $skill['name'] }}</span>
                            <span style="color: #999;">{{ $skill['level'] }}%</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Experience -->
        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 18px; border-left: 4px solid #00f3ff; padding-left: 10px; margin-bottom: 15px;">SERVICE HISTORY</h2>
            @foreach($experiences as $exp)
            <div style="margin-bottom: 15px;">
                <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 14px;">
                    <span>{{ strtoupper($exp['title']) }}</span>
                    <span style="color: #666;">{{ $exp['year'] }}</span>
                </div>
                <div style="font-size: 13px; color: #00f3ff; margin-bottom: 5px;">{{ $exp['company'] }}</div>
                <p style="font-size: 12px; color: #444; margin: 0;">{{ $exp['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Education -->
        <div>
            <h2 style="font-size: 18px; border-left: 4px solid #00f3ff; padding-left: 10px; margin-bottom: 15px;">ACADEMIC BACKGROUND</h2>
            @foreach($educations as $edu)
            <div style="margin-bottom: 10px;">
                <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 14px;">
                    <span>{{ $edu['sekolah'] }}</span>
                    <span style="color: #666;">{{ $edu['tahun'] }}</span>
                </div>
                <div style="font-size: 13px; color: #333;">{{ $edu['jurusan'] }} ({{ $edu['ipk'] }} GPA)</div>
            </div>
            @endforeach
        </div>
    </div>
</div>

            <h2>Impact Stream</h2>
            <div class="row">
                @foreach($verifiedHours as $hour)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="post-caption mb-3">
                                    <h3>{{ $hour->caption ?? 'Volunteer Service' }}</h3>
                                </div>
                                @if($hour->proof_path)
                                    <img src="{{ Storage::url($hour->proof_path) }}" alt="Volunteer Service Proof" class="img-fluid mb-3" style="max-height: 300px; width: 100%; object-fit: cover;">
                                @endif
                                <h4>{{ $hour->opportunity->Name ?? 'Volunteer Service' }}</h4>
                                <p><strong>Hours:</strong> {{ $hour->hours }}</p>
                                <p><strong>Date:</strong> {{ $hour->date->format('F j, Y') }}</p>
                                @if($hour->description)
                                    <p><strong>Description:</strong> {{ $hour->description }}</p>
                                @endif
                                <div class="post-meta mt-3">
                                    <p>Posted by: {{ $hour->user->first_name }} {{ $hour->user->last_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach($opportunities as $opportunity)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h3>{{ $opportunity->Name }}</h3>
                                <p><strong>Organization:</strong> {{ $opportunity->organization->name ?? 'N/A' }}</p>
                                <p><strong>Description:</strong> {{ $opportunity->description }}</p>
                                <p><strong>Location:</strong> {{ $opportunity->location }}</p>
                                <p><strong>Date:</strong> {{ $opportunity->date->format('F j, Y') }}</p>
                                <a href="{{ route('student.submit.hours') }}" class="btn btn-primary">Submit Hours</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
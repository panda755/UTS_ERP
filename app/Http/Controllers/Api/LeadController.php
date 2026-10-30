<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    private const SOURCES = ['website', 'referral', 'kampanye', 'event', 'lainnya'];

    private const STATUSES = ['baru', 'dihubungi', 'negosiasi', 'deal', 'batal'];

    public function index(): JsonResponse
    {
        return response()->json(Lead::latest()->get());
    }

    public function show(Lead $lead): JsonResponse
    {
        return response()->json($lead);
    }

    public function store(Request $request): JsonResponse
    {
        $lead = Lead::create($this->validated($request));

        return response()->json($lead->fresh(), 201);
    }

    public function update(Request $request, Lead $lead): JsonResponse
    {
        $lead->update($this->validated($request, partial: true));

        return response()->json($lead->fresh());
    }

    public function destroy(Lead $lead): JsonResponse
    {
        $lead->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    private function validated(Request $request, bool $partial = false): array
    {
        $required = $partial ? 'sometimes' : 'required';

        return $request->validate([
            'name' => [$required, 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'source' => ['sometimes', Rule::in(self::SOURCES)],
            'status' => ['sometimes', Rule::in(self::STATUSES)],
            'last_contacted_at' => ['nullable', 'date'],
            'notes' => ['nullable', 'string'],
        ]);
    }
}
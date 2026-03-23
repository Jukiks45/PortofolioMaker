<?php

namespace App\Services;

class TemplateService
{
    public function transform(array $data): array
    {
        // =========================
        // BASIC
        // =========================
        $data['address'] = $data['location'] ?? '';

        // =========================
        // EDUCATION
        // =========================
        $data['education'] = [];

        if (isset($data['education_degree'])) {
            foreach ($data['education_degree'] as $i => $degree) {
                $data['education'][] = [
                    'institution' => $data['education_institution'][$i] ?? '',
                    'degree' => $degree,
                    'field' => $data['education_field'][$i] ?? '',
                    'start_year' => $data['education_start_year'][$i] ?? '',
                    'end_year' => $data['education_end_year'][$i] ?? '',
                ];
            }
        }

        // =========================
        // EXPERIENCE
        // =========================
        $data['experience'] = [];

        if (isset($data['experience_company'])) {
            foreach ($data['experience_company'] as $i => $company) {
                $data['experience'][] = [
                    'company' => $company,
                    'position' => $data['experience_position'][$i] ?? '',
                    'location' => $data['experience_location'][$i] ?? '',
                    'start_date' => $data['experience_start_date'][$i] ?? '',
                    'end_date' => $data['experience_end_date'][$i] ?? '',
                    'description' => $data['experience_description'][$i] ?? '',
                ];
            }
        }

        // =========================
        // SKILLS
        // =========================
        $data['skills'] = [];

        if (isset($data['skill_name'])) {
            foreach ($data['skill_name'] as $i => $name) {
                $data['skills'][] = [
                    'name' => $name,
                    'level' => $data['skill_level'][$i] ?? '',
                ];
            }
        }

        // =========================
        // PROJECTS
        // =========================
        $data['projects'] = [];

        if (isset($data['project_name'])) {
            foreach ($data['project_name'] as $i => $name) {
                $data['projects'][] = [
                    'name' => $name,
                    'url' => $data['project_url'][$i] ?? '',
                    'description' => $data['project_description'][$i] ?? '',
                ];
            }
        }

        // =========================
        // REFERENCES
        // =========================
        $data['reference'] = [];

        if (isset($data['reference_name'])) {
            foreach ($data['reference_name'] as $i => $name) {
                $data['reference'][] = [
                    'name' => $name,
                    'position' => $data['reference_position'][$i] ?? '',
                    'company' => $data['reference_company'][$i] ?? '',
                    'phone' => $data['reference_phone'][$i] ?? '',
                ];
            }
        }

        return $data;
    }
}

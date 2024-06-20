<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SettingsWorkflowTasks;
use App\Models\SettingsWorkflowQualityControl;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => '12345678',
        ]);

        // Insert multiple records into SettingsWorkflowTasks table
        SettingsWorkflowTasks::insert([
            [
                'task_name' => 'Status Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Sample Request',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Review Confirmation',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Ship Date Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Shipment Request',
                'department' => 'Logistics',
            ],
            [
                'task_name' => 'Sourcing Request',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Database Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Sample Review',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Style Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'BOM Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'POM Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Techpack Update',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Request for Quotation',
                'department' => 'Product Development',
            ],
            [
                'task_name' => 'Supplier Update',
                'department' => 'Product Development',
            ],
        ]);

        SettingsWorkflowQualityControl::insert([
            [
                "type" => "General",
                "check" => "Overall Appearance",
                "description" => "Check overall appearance",
                "status" => "inactive"
            ],
            [
                "type" => "General",
                "check" => "Fabric",
                "description" => "Verify fabric quality & placement",
                "status" => "inactive"
            ],
            [
                "type" => "General",
                "check" => "Colour",
                "description" => "Verify fabric quality & placement",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Sewing",
                "description" => "Verify sewing quality & placement",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Inside Seam Finishing",
                "description" => "Check finishing of inside seams",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Hemming",
                "description" => "Ensure hems are even and well finished",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Bar Tacks",
                "description" => "Check bar tacks at stress points",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Pockets",
                "description" => "Verify pocket placement, size & functionality",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Fastenings",
                "description" => "Check all fastenings (e.g. velcro, hooks, tapes) for placement & functionality",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Linings",
                "description" => "Ensure lining is properly attached",
                "status" => "inactive"
            ],
            [
                "type" => "Construction",
                "check" => "Elastic",
                "description" => "Check elasticity and attachment of any elastic components",
                "status" => "inactive"
            ],
            [
                "type" => "Fit & POMs",
                "check" => "Fit",
                "description" => "Assess overall fit",
                "status" => "inactive"
            ],
            [
                "type" => "Fit & POMs",
                "check" => "Measurements",
                "description" => "Verify garment measurements against spec",
                "status" => "inactive"
            ],
            [
                "type" => "Fit & POMs",
                "check" => "Balance & Drape",
                "description" => "Check for proper balance and drape",
                "status" => "inactive"
            ],
            [
                "type" => "Trims",
                "check" => "Zippers",
                "description" => "Check zippers for type, functionality, placement and finishing",
                "status" => "inactive"
            ],
            [
                "type" => "Trims",
                "check" => "Buttons",
                "description" => "Check buttons for type, functionality, placement and finishing",
                "status" => "inactive"
            ],
            [
                "type" => "Trims",
                "check" => "Buttonholes",
                "description" => "Check buttonholes for type, functionality, placement and finishing",
                "status" => "inactive"
            ],
            [
                "type" => "Trims",
                "check" => "Snaps",
                "description" => "Check snaps for type, functionality, placement and finishing",
                "status" => "inactive"
            ],
            [
                "type" => "Trims",
                "check" => "Labels & Tags",
                "description" => "Check labels & tags for type, functionality, placement and finishing",
                "status" => "inactive"
            ],
            [
                "type" => "Trims",
                "check" => "Prints",
                "description" => "Check outlook and placement of any prints",
                "status" => "inactive"
            ]
        ]);        
    }
}
